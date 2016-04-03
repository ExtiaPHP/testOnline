<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id_question');
            $table->text('question');
            $table->integer('point');
        });

        DB::statement('INSERT INTO `question` (`id_question`, `question`, `point`) VALUES
(1, "Quelle entreprise est à l\'origine de symfony ?", 1),
(2, "Quelle est la version Long-Time support actuelle ?", 1),
(3, "Quels sont les dossiers présents à la racine d’un projet Symfony 2, en édition\r\nstandard", 1),
(4, "Quel est le gestionnaire de paquets utilisé par défaut par Symfony 2", 1),
(5, "Quelle est la main-class qui permet de lancer une application Symfony 2", 1),
(6, "Quel est le chemin d’accès aux commandes Symfony 2", 1),
(7, "Un bundle ne peut pas contenir de js, css ou images ?", 1),
(8, "Un bundle peut disposer de ses propres routes ?", 1),
(9, "Les bundles sont seulement une bonne pratique pour cloisonner les éléments de code de l’application ; il est possible de développer sans sur Symfony ?", 1),
(10, "Un bundle s’inclut dans l’application via la main-class ?", 1),
(11, "Quelles librairies Open-Sources sont incluses nativement dans Symfony 2 –édition standard", 1),
(12, "Quelle définition de route est correcte pour que le framework puisse interpréter « id » comme étant", 1),
(13, "Sur quelle méthode les routes précédentes pointent-elles", 1),
(14, "Dans un controller, comment récupérer le paramètre d’url « id »,\r\nest passé en POST ?", 1),
(15, "Quelle méthode permet d’appeler un template depuis un controller ?", 1),
(16, "Quelles lignes permettent de faire une redirection Http sur la route “homepage”\r\ndepuis un controller", 1),
(17, "Il est possible de traduire des clés de traductions n’importe où dans l’application\r\ngrâce au service «", 1),
(18, "Il est possible de paramétrer la pluralisation d’une traduction avec le filtre |transchoice et la syntaxe  key: {0} one element | [1, Inf] many elements", 1),
(19, "Il est possible d’inclure des variables et des callbacks dans les traductions comme suit\n{{ ‘key’|trans( ‘%callback%’ : function($var){\n\n       return empty($var) ? ‘a’ || ‘b’;               \n\n   } })\n\n}}", 1),
(20, "Pour accéder à la clé « recruit_header » dans le il faut utiliser le code suivant :                                                                                \r\n{{ ‘extia.recruit_header’|trans({ }, ‘fr’) }}", 1),
(21, "Comment appeler un controller depuis une vue, en lui passant le paramètre « recruit_state »", 1),
(22, "« form.type » est un type service ?", 1),
(23, "Les form-types permettent d’imbriquer des formulaires", 1),
(24, "Les éléments de base des formulaires Symfony 2 (text, textarea, checkbox,…) ne sont pas des « form.types », mais permettent d’en créer de nouveaux", 1),
(25, "Il est possible de créer directement une instance de formulaire à partir d’un « form.type » et du", 1),
(26, "Il est possible de définir plusieurs modes d’authentification sur une même application (http classique, via formulaire, via ldap…)", 1),
(27, "Les niveaux d’accès des utilisateurs dans le composant Security sont appelés Credentials", 1),
(28, "Il est possible de gérer des niveaux d’accès de manière dynamique (via une base de données par exemple) à travers les Voters de sécurité", 1),
(29, "Pour pouvoir utiliser la session Php dans une route, il est nécessaire de déclarer la route sous un Firewall Symfony 2", 1),
(30, "Il existe quatre types d’injection pour un service : une valeur fixe, un de container, un service et une collection", 1),
(31, "Les tags de services permettent d’accéder à des points d’entrée mis à disposition par les bundles de l’application pour une tâche précise, exemple : le tag « router.loader » permet d’ajouter des routes dynamiquement", 1),
(32, "« factory-service », « abstract », « file » définition d’un service", 1),
(33, "Il est possible de modifier la manière dont le composant d’injection compile le container de services via des CompilationPassInterface, définis dans la configuration « framework » de fichier config.yml", 1),
(34, "Symfony 2 permet de gérer les headers de cache des réponses http des controllers via les attributs sous la clé « cache-control » des fichiers", 1),
(35, "Symfony 2 met à disposition un reverse-proxy Php, activable dans les fronts controllers", 1),
(36, "Il est possible de rendre les controllers en ESI, de manière transparente si aucun reverse proxy n’est paramétré sur l’environnement courant", 1),
(37, "Par défaut, Symfony 2 génère une directive « no-cache » dans les si aucune directive de cache n’a été définie au préalable dans le code ou les configurations", 1),
(38, "En considérant l’arbre sémantique de configuration suivant, quelles sont les configurations valides pour cet arbre ?\r\n$treeBuilder = new TreeBuilder();\r\n\r\nreturn $treeBuilder->root(""extia"")\r\n    ->children()\r\n        ->arrayNode(""locales"")\r\n            ->isRequired()->prototype(""scalar"")->end() \r\n        ->end()\r\n        ->arrayNode(""actions"") \r\n            ->useAttributeAsKey(""name"")->cannotBeEmpty()\r\n            ->prototype(""array"")\r\n                ->children() \r\n                ->end()\r\n            ->end()\r\n        ->end()\r\n    ->end();\r\n    ->scalarNode(""template"")->isRequired()->end() \r\n    ->scalarNode(""format"")->end()", 1);
');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question');
    }
}
