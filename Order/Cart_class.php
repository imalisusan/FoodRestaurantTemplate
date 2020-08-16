<?php
//start session
if(!session_id())
{
    session_start();
}
class Cart
{
    protected $cart_contents = array();

    public function __construct()
    {
        //get the shopping cart array from the session
        $this ->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
        if($this ->cart_contents ==NULL)
        {
            //set some base values
            $this ->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        }
    }

    //Cart Contents: Returns the entire cart array
    public function contents()
    {
        //rearrange the newest first
        $cart = array_reverse($this->cart_contents);

        //remove these so they dont create a problem when showing the cart table
        unset($cart['total_items']);
        unset($cart['cart_total']);
        
        return $cart;

    }

    //Get cart item: Returns a specific cart item details
    public function get_item($row_id)
    {
        return(in_array($row_id, array('total_items', 'cart_total'), TRUE) OR !isset($this->cart_contents[$row_id]))
        ? FALSE
        :$this->cart_contents[$row_id];
    }

    //Total Items: Returns the total item count
    public function total_items()
    {
        return $this->cart_contents['total_items'];
    }

    //Cart Tota: Returnsthe total price
    public function total()
    {
        return $this->cart_contents['cart_total'];
    }

    //Insert Items into the cart and save i to the session
    public function insert($item = array())
    {
        if(!is_array($item) OR count($item) == 0)
        {
            return FALSE;
        }
        else
        {
            if(!isset($item['id'], $item['name'], $item['price'], $item['qty']))
            {
                return FALSE;
            }
            else //inser item
            {
                //prepare the quantity
                $item['qty'] = (float) $item['qty'];
                if($item['qty'] == 0)
                {
                    return FALSE;
                }
                //prepare the price
                $item['price'] = (float) $item['price'];
                //create a unique identifier for the item being inserted into the cart
                $rowid = md5($item['id']);
                //get quantity if its already there and add it on
                $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] :0;
                //recreate the entry with unique identifier and updated quantity
                $item['rowid'] = $rowid;
                $item['qty'] += $old_qty;
                $this->cart_contents[$rowid] = $item;

                //save cart item
                if($this->save_cart())
                {
                    return isset($rowid) ? $rowid :TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
        }
    }

    //Update the cart
    public function update($item = array())
    {
        if (!is_array($item) OR count($item) == 0)
        {
            return FALSE;
        }
        else
        {
            if(!isset($item['row_id'], $this->cart_contents[$item['rowid']]))
            {
                return FALSE;
            }
            else
            {
                //prepare the quantity
                if(isset($item['qty']))
                {
                    $item['qty'] = (float) $item['qty'];
                    //remove the item from the cart, if quantity is zero
                    if($item['qty'] == 0)
                    {
                        unset($this->cart_contents[$item['rowid']]);
                        return TRUE;
                    }
                }
                //find updatable keys
                $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item));
                //prepare the price
                if(isset($item['price']))
                {
                    $item['price'] = (float) $item['price'];
                }
                //product id and name shouldn't be changed
                foreach(array_diff($keys, array('id', 'name')) as $key)
                {
                    $this->cart_contents[$item['rowid']][$key] = $item[$key];
                }
                //save cart data
                $this->save_cart();
                return TRUE;
            }
        }
    }

    //Svae the cart array to the session
    protected function save_cart()
    {
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] =0;
        foreach($this->cart_contents as $key => $val)
        {
            //make sure the array contains the proper indexes
            if(!is_array($val) OR !isset($val['price'], $val['qty']))
            {
                continue;
            }
            $this->cart_contents['cart_total'] += ($val['price'] = $val['qty']);
            $this->cart_contents['total_items'] += $val['qty'];
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['price'] = $this->cart_contents[$key]['qty']);
        }
        //if cart is empty, delete it from the session
        if(count($this->cart_contents) <= 2)
        {
            unset($_SESSION['cart_contents']);
            return FALSE;
        }
        else
        {
            $_SESSION['cart_contents'] = $this->cart_contents;
            return TRUE;
        }
    }

    //Remove an item from the cart
    public function remove($row_id)
    {
        //unset and save
        unset($this->cart_contents[$row_id]);
        $this->save_cart;
        return TRUE;
    }
    
    //Empty the cart and destroy the session
    public function destroy()
    {
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contents']);
    }





}




?>