# MessageAPI
API utilisée pour envoyer des messages sur une base de données (pour le projet SAE1.05 en BUT MMI Champs)

Le projet réalisé par les étudiantes et étudiants du BUT MMI pour la [situation d'apprentissage et d'évaluation 1.05 « Produire un site web »](http://ligm.univ-eiffel.fr/~gambette/ENSIUT/PPN-BUT-MMI-2022.pdf#page=51) prévoit, à l'IUT de Marne-la-Vallée sur le site de Champs-sur-Marne, [l'envoi par un formulaire de données vers une base de données](https://docs.google.com/document/d/1TLfKBoe5KqCXT-KKpeWcgV5kn3VDvDQJZdivc-j5atg/edit?usp=sharing), à un moment où les bases de données n'ont pas encore été enseignées. Il est donc proposé pour cela d'utiliser le langage Javascript pour appeler une API écrite en PHP, qui fait les envois à une base de données.

La base de données doit contenir une table messages, fournie dans le fichier `messages.sql`.

Le fichier `api.php` doit être personnalisé en modifiant les informations de connexion à la base de données et en indiquant le nom et l'adresse de courriel de la personne responsable des traitements de données à caractère personnel.

Démo : https://gambette.butmmi.o2switch.site/api.php