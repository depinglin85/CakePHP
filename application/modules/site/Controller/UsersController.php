<?php
App::uses('Card', 'Util');
//App::import('Lib', 'Card');
class UsersController extends AppController
{
    
    public function index()
    {
//        $this->Session->write("lin", "deping");
        Card::bill();
//        $this->Card->show();
    }
}