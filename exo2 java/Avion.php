<?php
abstract class Avion 
{
	protected $demarrer=FALSE;
	protected $vitesse=0;
	protected $AltitudeMax;
    protected $altitude;
    

	// On oblige les classes filles à définir les méthodes abstracts
	abstract function decelerer($vitesse);
	abstract function accelerer($vitesse);


    class Avion extends Vehicule 
    {
	const ALTITUDE_MAX = 400000;
    const VITESSE_MAX=2000;
	private static $_compteur = 0;
    }
	public static function getNombreVoiture()
	{
		return self::$_compteur;
	}



	public function demarrer() 
	{
		$this->demarrer=TRUE;
	}

	public function eteindre() 
	{
		$this->demarrer=FALSE;
	}

	public function estDemarre() 
	{
		return $this->demarrer;
	}

	public function estEteint() 
	{
		return $this->$this->demarrer;
	}
	
	public function getVitesse() 
	{
		return $this->vitesse;
	}

	public function getVitesseMax() 
	{
		return $this->vitesseMax;
	}


    public function setVitesseMax($vMax) 
	{

		if ( $vMax > self::VITESSE_MAX) 
		{
			$this->vitesseMax = self::VITESSE_MAX;
		}
		elseif ( $vMax > 0 )
		{
			$this->vitesseMax = $vMax;
		}	
		else
		{
			$this->vitesseMax = 0;
		}	
	}

	public function setVitesse($vitesse) 
	{

		if ( $vitesse > $this->getAltitudeMax()) 
		{
			$this->vitesse = $this->getVitesseMax();
		}
		elseif ( $vitesse > 0 )
		{
			$this->vitesse = $vitesse;
		}	
		else
		{
			$this->vitesse = 0;
		}	
	}

	public function getVitesse() 
	{
		return $this->vitesse;
	}

	public function getVitesseMax() 
	{
		return $this->vitesseMax;
	}

// Pour activer le train d'atterisssage

    public function trainactiver() 
	{
		$this->demarrer=FALSE;
	}

	public function traindesactive() 
	{
		return $this->demarrer;
	}




    public function __toString()
	{
		$chaine = parent::__toString();
		$chaine .= "L'avion a une altitude max de'".$this->AltitudeMax." metres <br/>";
		if ( $this->demarrer )
		{
			$chaine .= "Il démarre <br/>";
			$chaine .= "Sa vitesse est actuellement de ".$this->getVitesse(). "km/h <br/>";
		}
		else
		{
			$chaine .= "Il est arretée <br/>";
		}
		return $chaine;
	}


	public function __toString()
	{
		$chaine = "Ceci est un véhicule <br/>";
		$chaine .= "---------------------- <br/>";
		return $chaine;
	}




    //creation de l'avion 1

    $av1 = new Avion(110);
    echo $av1;
   