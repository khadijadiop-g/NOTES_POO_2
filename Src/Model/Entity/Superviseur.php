    <?php

    class Superviseur{
    private ?int $id;
    private string $nomSup;
    private string $prenom;
    private string $email;
    private string $mot_de_passe;
    private Role $roleId;

    public function __construct(?int $id,string $nomSup,string $prenom,string $email,string $mot_de_passe,Role $roleId){
    $this->id=$id;
    $this->nomSup=$nomSup;
    $this->prenom=$prenom;
    $this->email=$email;
    $this->mot_de_passe=$mot_de_passe;
    $this->roleId=$roleId;

    }



    }