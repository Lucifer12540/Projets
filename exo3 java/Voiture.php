<?php
class Voiture
{
	// Atrributs d'un pilote
	private $_ID;
	private $_NameModele;
	private $_Carroserie;
	private $_NbPorte;
    private $_Vcoff;
}

public function __construct(array $donnees)




//La fonction hydrate 
{
	$this->hydrate($donnees);
}

public function hydrate(array $donnees)
{
	foreach ($donnees as $key => $value) {
		$method = 'set'.$key;
		if (method_exists($this, $method))
		{
			$this->$method($value);
		}
		else
		{
			trigger_error('Je trouve pas la méthode !', E_USER_WARNING);
		}
	}
}

public function __toString()
{
	return "Voiture ".$this->getNameModele()." qui as pour modele ".$this->getCarroserie()." dont la carroserie est ".$this->getVcoff();
}

// Les getters

public function getNameModele()
{
	return $this->_NameModele;
}
public function getCarroserie()
{
	return $this->_Carroserie;
}
public function getNbPorte()
{
	return $this->_NbPorte;
}
public function getVCoff()
{
	return $this->_Vcoff. " L";
}



//Les setters
public function setNameModele($NameModele)
	{
		$NameModele = (int) $NameModele;
		
		if ($NameModele > 0)
		{
			$this->_NameModele = $NameModele;
		}
	}

	public function setCarroserie(Carroserie)
	{
		if (is_string($Carroserie))
		{
			$this->_Carroserie = $Carroserie;
		}
	}

	public function setAddress($VCoff)
	{
		if (is_string($VCoff))
		{
			$this->_VCoff = $VCoff;
		}
	}






class VoitureManager


{
	// Objet type PDO
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	// CRUD

	// Ajout d'un voiture
	public function add(Voiture $modelevoiture)
	{
		$q = $this->_db->prepare('INSERT INTO specvoiture (ID, NameModele, Carroserie , NbPorte, VCoff) VALUES(:ID, :NameModele, :Carroserie, :NbPorte; :VCoff)');	
		$q->bindValue(':ID', $modelevoiture->getID());
		$q->bindValue(':NameModele', $modelevoiture->getNameModele());
		$q->bindValue(':Carroserie', $modelevoiture->getCarroserie());
		$q->bindValue(':NbPorte', $modelevoiture->getNbPorte());
        $q->bindValue(':Vcoff', $modelevoiture>getVCoff());
		$q->execute();
    }
}

// Supression d'une voiture
public function delete(Voiture $voiture)
{
    $this->_db->exec('DELETE FROM specvoiture WHERE ID = '.$voiture->getID());
}



//Modif voiture

public function update(Voiture $voiture)
	{
		$q = $this->_db->prepare('UPDATE specvoiture
			SET ID = :ID,
			NameModele = :Address,
			Carroserie = :Salary,
            Vcoff = :Vcoff,
            NbPorte = :NbPorte
			WHERE ID = :ID');
		$q->bindValue(':NameModele', $voiture->getNameModele(), PDO::PARAM_STR);
		$q->bindValue(':Carroserie', $voiture->getCarroseries(), PDO::PARAM_STR);
		$q->bindValue(':Vcoff', $$voiture->getVcoff(), PDO::PARAM_STR);
		$q->bindValue(':NbPorte ', $$voiture->getNbPorte (), PDO::PARAM_INT);
		$q->execute();
	}






       {
        $voitudecoucou = new Voiture([
            'ID' => 1900,
            'NameModele' => 'C15',
            'Carroserie' => 'Coupé',
            'Vcoff' => '23',
            'NbPorte' => '5']);
        }
        try {
            $db = new PDO('mysql:host=127.0.0.1:3306;dbname=voiture','root','');
        } 
        catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
            die();
        }
        
        $manager = new PiloteManager($db);

        //Liste des voitures
        $listeVoiture = $manager->getList();