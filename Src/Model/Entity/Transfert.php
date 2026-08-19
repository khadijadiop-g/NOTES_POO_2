<?php

class Transfert{
    private ?int $id;
    private Inscription $id_inscription;
    private DateTime $date_transfert;
    private StatutTransfert $type_transfert;
    public function __construct(Inscription $id_inscription,DateTime $date_transfert,?int $id=null,StatutTransfert $type_transfert= StatutTransfert::ENTRANT){
        $this->id=$id;
        $this->id_inscription=$id_inscription;
        $this->date_transfert=$date_transfert;  
        $this->type_transfert=$type_transfert;
    }
    public function getId():?int{return $this->id;}
    public function getIdInscription():Inscription{return $this->id_inscription;}
    public function getDateTransfert():DateTime{return $this->date_transfert;}
    public function getTypeTransfert():StatutTransfert{return $this->type_transfert;}
    public function setId(?int $id):void{$this->id=$id;}
    public function setIdInscription(Inscription $id_inscription):void{$this->id_inscription=$id_inscription;}
    public function setDateTransfert(DateTime $date_transfert):void{$this->date_transfert=$date_transfert;}
    public function setTypeTransfert(StatutTransfert $type_transfert):void{$this->type_transfert=$type_transfert;}  

    public static function toEntity(stdClass $obj): Transfert
    {
    return new Transfert(id_inscription:Inscription::toEntity($obj),
                              date_transfert:$obj->date_transfert,
                              type_transfert:$obj->type_transfert
                               
        
        );
    }


}