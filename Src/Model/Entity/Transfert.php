<?php

class Transfert{
    private ?int $id;
    private int $id_inscription;
    private DateTime $date_transfert;
    private string $type_transfert;
    public function __construct(?int $id,int $id_inscription,DateTime $date_transfert,string $type_transfert){
        $this->id=$id;
        $this->id_inscription=$id_inscription;
        $this->date_transfert=$date_transfert;  
        $this->type_transfert=$type_transfert;
    }
    public function getId():?int{return $this->id;}
    public function getIdInscription():int{return $this->id_inscription;}
    public function getDateTransfert():DateTime{return $this->date_transfert;}
    public function getTypeTransfert():string{return $this->type_transfert;}
    public function setId(?int $id):void{$this->id=$id;}
    public function setIdInscription(int $id_inscription):void{$this->id_inscription=$id_inscription;}
    public function setDateTransfert(DateTime $date_transfert):void{$this->date_transfert=$date_transfert;}
    public function setTypeTransfert(string $type_transfert):void{$this->type_transfert=$type_transfert;}  


}