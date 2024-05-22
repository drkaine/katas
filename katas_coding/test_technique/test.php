<?php

class catalogue {
    public function __construct(
        private array $listEvenement,
    )
    {
        
    }

    public function getAllEvenements()
    {
        $get
    }

}


abstract class evenement {
    public function __construct(
        protected Carbon $date,
        protected string $intitule,
        protected string $lieu,
        protected int $tarif,
    ){}

}

interface evenementInterface {
    public function getInformation(): string;
}

class sportif extends evenement implements evenementInterface {

    public function __construct(
        private NiveauType $niveau ,
        Carbon $date,
        string $intitule,
        string $lieu,
        int $tarif,
    ){
        parent::__construct($date,
        $intitule,
        $lieu,
        $tarif,);
    }

    public function getInformation(): string
    {
        return $this->intitule . ' le ' . $this->date . ' à ' . $this->lieu . ' - ' . $this->niveau::value . ' : ' . $this->prix;
    }
}

class culturel extends evenement implements evenementInterface {

    public function __construct(
        private int $places,
        Carbon $date,
        string $intitule,
        string $lieu,
        int $tarif,
    ){
        parent::__construct($date,
        $intitule,
        $lieu,
        $tarif,);
    }

    public function getInformation(): string
    {
        return $this->intitule . ' le ' . $this->date . ' à ' . $this->lieu . ' (' . $this->places . ' places disponibles) : ' . $this->prix;
    }
}

enum NiveauType: string
{
	case CONFIRMED = 'Confirmé uniquement';
	case ALL = 'Tous niveaux acceptés';
	case DEBUTANT = 'Débutant uniquement';
}
