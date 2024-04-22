## Partie théorique

### Méthode _ _get

````php
public function __get($name){
echo ($name.'  inaccessible <br>');
}
````

Permet de détecter l’accession à un attribut inaccessible. 

````php 
$laSession->jesuis;
````
---

### Méthode _ _set

````php
public function __set($name,$value){
        echo ('Impossible d\'affecter la valeur '.$value.' à l\'attribut '.$name.' qui est inaccessible<br>');
    }
````
Permet de détecter l’affectation d’une valeur à un attribut inaccessible.
````php 
$laSession-> jose = "jose";
````
---

### Méthode _ _isset

````php
public function __isset( $name)
    {
        echo ('Appel de la fonction PHP isset sur l\'attribut '.$name.' qui est inaccessible <br>');
    }
````

 Permet de détecter l’appel de la fonction PHP « isset » ou « empty » sur un attribut inaccessible.

````php 
isset($laSession->name);
````
---
### Méthode _ _unset

````php
public function __unset($name){
        echo ('Appel de la fonction PHP unset sur l\'attribut '.$name.' qui est inaccessible <br>');
    }
````

Permet de détecter l’appel de la fonction PHP « unset » sur un attribut inaccessible

````php 
unset($laSession->name);
````
---
### Méthode _ _sleep

````php
public function __sleep(){
        return [
            "nom",
            "prenom",
        ];
    }
````

Appelée quand on utilise la fonction php « serialize » sur un objet 

````php 
$seri = serialize($laSession);
````