

<?php 
class AnneScolaire{
    private ?int $id;
    private DateTime $debut;
    private DateTime $fin;
    private int $est_active;
    public function __construct(?int $id=null,DateTime $debut,DateTime $fin,int $est_active=0){
        $this->id=$id;
        $this->debut=$debut;
        $this->fin=$fin;
        $this->est_active=$est_active;
    }
    public function getId():?int{return $this->id;}
    public function getDebut():DateTime{return $this->debut;}
    public function getFin():DateTime{return $this->fin;}  
    public function getEstActive():int{return $this->est_active;}
    public function setId(?int $id):void{$this->id=$id;}
    public function setDebut(DateTime $debut):void{$this->debut=$debut;}
    public function setFin(DateTime $fin):void{$this->fin=$fin;}
    public function setEstActive(int $est_active):void{$this->est_active=$est_active;}  
    public static function toEntity(stdClass $obj): AnneScolaire
    {
        return new AnneScolaire(debut: $obj->debut,fin: $obj->fin);
    }
}