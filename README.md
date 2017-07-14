## Voici mon propre framework @Nolht

***

#### Syntaxe pour les class :

Pour formater le css toutes les class doivent êtres :
* Insérer dans le dossier public/css/
* Chaques controller doit contenir ces class, à l'exception des class pour la __view__ par défaut.
* Toutes les class doivent commencer par leurs noms de controller puis le div parent et ensuite un nom personnaliser, le tout séparer par des underscores/
* Pour finir, toutes déclarations de class doit contenir le path complet vers l'élèment.


#### Syntaxe pour créer votre formulaire :
>Dans un premier temps, il suffit de créer un JSON valide et de le mettre dans /modules/formulaires/[un nom à inclure].json

La syntaxe est vraiment simple, vous n'avez que à mettre un objet __init__ qui doit contenir au minimum une clef *method* et une clef *action*, vous pouvez potentiellement ajouté une clef class.

Pour ajouté un input numéroté vos objets dans l'ordre que vous le souhaitez, chaques objets doit au minimum contenir une clef *type* et une clef *name* comme l'objet init vous pouvez rajouté une clef *class*

Exemple :
````JSON
{
	"init": {
		"method": "POST",
		"action": "connexion/signIn"
	},
	"0": {
		"type": "text",
		"name": "login",
		"class": "connexion_input_login"
	},
	"1": {
		"type": "password",
		"name": "password",
		"class": "connexion_password_password"
	}
}
```
