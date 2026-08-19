    <?php

    class Superviseur{
    private ?int $id;
    private string $nomSup;
    private string $prenom;
    private string $email;
    private string $mot_de_passe;
    private Role $roleId;

    public function __construct(string $nomSup,string $prenom,string $email,string $mot_de_passe,Role $roleId,?int $id=null){
    $this->id=$id;
    $this->nomSup=$nomSup;
    $this->prenom=$prenom;
    $this->email=$email;
    $this->mot_de_passe=$mot_de_passe;
    $this->roleId=$roleId;

    }
    public function getId():?int{return $this->id;}
    public function getNomSup():string{return $this->nomSup;}
    public function getPrenom():string{return $this->prenom;}
    public function getEmail():string{return $this->email;}
    public function getMotDePasse():string{return $this->mot_de_passe;}
    public function getRoleId():Role{return $this->roleId;}
    public function setId(?int $id):void{$this->id=$id;}  
    public function setNomSup(string $nomSup):void{$this->nomSup=$nomSup;}
    public function setPrenom(string $prenom):void{$this->prenom=$prenom;}
    public function setEmail(string $email):void{$this->email=$email;}
    public function setMotDePasse(string $mot_de_passe):void{$this->mot_de_passe=$mot_de_passe;}
    public function setRoleId(Role $roleId):void{$this->roleId=$roleId;} 

        public static function toEntity(stdClass $obj): Superviseur
    {
        return new Superviseur(nomSup: $obj->nom_sup,
                               prenom: $obj->prenom,
                               email: $obj->email,
                               id: $obj->id,
                               mot_de_passe: $obj->mot_de_passe,
                               roleId: Role::toEntity($obj)
                               
                               );
    }



    }