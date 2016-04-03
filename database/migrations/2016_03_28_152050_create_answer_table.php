<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->increments('id_answer');
            $table->integer('id_question');
            $table->foreign('id_question')->references('id_question')->on('question');
            $table->string('answer', 250);
            $table->boolean('flag_good');
        });

        DB::statement('INSERT INTO `answer` (`id_answer`, `id_question`, `answer`, `flag_good`) VALUES
(1, 1, "Sensible labs", 0),
(2, 1, "Sensio labs", 1),
(3, 1, "George abitbol", 0),
(4, 2, "2.2", 0),
(5, 2, "2.3", 1),
(6, 2, "2.4", 0),
(7, 2, "2.5", 0),
(8, 3, "apps/ cache/ config/ lib/ web/", 0),
(9, 3, "app/ cache/ lib/ vendor/ web/", 0),
(10, 3, "app/ src/ vendor/ web/", 1),
(11, 3, "app/ src/ logs/ vendor/ www/", 0),
(12, 4, "Packagist", 0),
(13, 4, "submodules git", 0),
(14, 4, "npm", 0),
(15, 4, "composer", 1),
(16, 5, "AppCore.php", 0),
(17, 5, "AppKernel.php", 1),
(18, 5, "AppConfig .php", 0),
(19, 5, "AppBootstrap.php", 0),
(20, 6, "php app/console", 1),
(21, 6, "php app/command", 0),
(22, 6, "php symfony", 0),
(23, 6, "php app/cli", 0),
(25, 7, "vrai", 0),
(26, 7, "faux", 1),
(28, 8, "vrai", 1),
(29, 8, "faux", 0),
(30, 9, "vrai", 0),
(31, 9, "faux", 1),
(32, 10, "vrai", 1),
(33, 10, "faux", 0),
(34, 11, "SwiftMailer", 1),
(35, 11, "Twig", 1),
(36, 11, "Assetic", 1),
(37, 11, "Monolog", 1),
(38, 12, "my_route :\r\n  pattern : “/extia/candidat/[id]”\r\n  defaults: { _controller:”ExtiaCandidatBundle:Test:results” }", 0),
(39, 12, "my_route :\r\n  pattern : “/extia/candidat/{id}”\r\n  defaults: { _controller:”ExtiaCandidatBundle:Test:results” }", 1),
(40, 12, "my_route :\r\n  pattern : “/extia/candidat/:id:”\r\n  defaults: { _controller:”ExtiaCandidatBundle:Test:results” }", 0),
(41, 12, "my_route :\r\n  pattern : “/extia/candidat/%id%”\r\n  defaults: { _controller:”ExtiaCandidatBundle:Test:results” }", 0),
(42, 13, "Extia\\CandidatBundle\\Controller\\Test::resultsAction (Request $request, $id)", 0),
(43, 13, "Extia\\CandidatBundle\\Controller\\TestActions::executeResults (Request $request)", 0),
(44, 13, "Extia\\CandidatBundle\\Controller\\TestController::resultsAction (Request $request)", 1),
(45, 13, "Extia\\CandidatBundle\\Controller\\Test::executeResults (Request $request, $id)", 0),
(46, 14, "$this->get(‘request’)->get(‘id’);", 0),
(47, 14, "$this->get(‘request’)->query->get(‘id’);", 0),
(48, 14, "$this->get(‘request’)->request->get(‘id’);", 1),
(49, 14, "$this->get(‘request’)->attributes->get(‘id’);", 0),
(50, 15, "$this->parse(‘results.html.twig’);", 0),
(51, 15, "$this->build(‘results.html.twig’);", 0),
(52, 15, "$this->render(‘results.html.twig’);", 1),
(53, 15, "$this->get(‘results.html.twig’);", 0),
(54, 16, "return $this->redirect(‘@homepage’);", 0),
(55, 16, "return new RedirectResponse(\r\n    $this->get(‘router’)->generate(‘homepage’)\r\n);", 1),
(56, 16, "return $this->redirect(‘homepage’);", 0),
(57, 16, "return $this->generate(‘homepage’);", 0),
(58, 17, "vrai", 1),
(59, 17, "fauw", 0),
(60, 18, "vrai", 1),
(61, 18, "faux", 0),
(62, 19, "vrai", 0),
(63, 19, "faux", 1),
(64, 20, "vrai", 1),
(65, 20, "faux", 0),
(66, 21, "{{ render(‘ExtiaCandidatBundle:Recruit:state’)\r\n  with {‘recruit_state’:‘open’}\r\n}}", 0),
(67, 21, "{{ include(controller(‘ExtiaCandidatBundle:Recruit:state’,\r\n  {‘recruit_state’:‘open’} ))\r\n}}", 0),
(68, 21, "{{ render(controller(‘ExtiaCandidatBundle:Recruit:state’,\r\n  {‘recruit_state’:‘open’} ))\r\n}}", 1),
(69, 21, "{{ include(‘ExtiaCandidatBundle:Recruit:state’)\r\n  with {‘recruit_state’:‘open’}\r\n}}", 0),
(70, 22, "vrai", 1),
(71, 22, "faux", 0),
(72, 23, "vrai", 1),
(73, 23, "faux", 0),
(74, 24, "vrai", 0),
(75, 24, "faux", 1),
(76, 25, "vrai", 1),
(77, 25, "faux", 0),
(78, 26, "vrai", 1),
(79, 26, "faux", 0),
(80, 27, "vrai", 0),
(81, 27, "faux", 1),
(82, 28, "vrai", 1),
(83, 28, "faux", 0),
(84, 29, "vrai", 1),
(85, 29, "faux", 0),
(86, 30, "vrai", 0),
(87, 30, "faux", 1),
(88, 31, "vrai", 1),
(89, 31, "faux", 0),
(90, 32, "vrai", 1),
(91, 32, "faux", 0),
(92, 33, "vrai", 0),
(93, 33, "faux", 1),
(94, 34, "vrai", 0),
(95, 34, "faux", 1),
(96, 35, "vrai", 1),
(97, 35, "faux", 0),
(98, 36, "vrai", 1),
(99, 36, "faux", 0),
(100, 37, "vrai", 1),
(101, 37, "faux", 0),
(102, 38, "extia:\r\n  locales: [ “fr”, “en” ]\r\n  actions: null", 0),
(103, 38, "extia :\r\n  locales : []\r\n  actions :\r\n  - [“test.html.twig” ]\r\n  - [“test.twig”, “html”]", 0),
(104, 38, "extia:\r\n  actions :\r\n    test :\r\n      template : test.html.twig\r\n      format : html\r\n    test2:\r\n      template: test2.html.twig", 0),
(105, 38, "extia:\r\n  locales: [ “fr”, “en” ]", 0)
');



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answer');
    }
}
