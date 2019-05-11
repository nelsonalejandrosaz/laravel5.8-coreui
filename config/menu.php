<?php

use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

/**
 * Codigo de automatizacion de menu
 */

Menu::macro('agregarSubmenu', function ($contenido) {
    //return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
    return Html::raw('<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon icon-puzzle"></i>' . $contenido . '</a>')->html();
});

Menu::macro('agregarItem', function ($nombreRuta, $texto) {
    return Link::toRoute($nombreRuta, '<i class="nav-icon icon-drop"></i><span>'. $texto .'</span>')->addParentClass('nav-item')->addClass('nav-link');
});

Menu::macro('test02', function () {
    return Menu::new()
        ->addClass('nav')
        ->add(Menu::menuSeparador('Testing'))
        ->add(Link::to('/', '<i class="nav-icon icon-drop"></i><span>Home</span>')->addParentClass('nav-item')->addClass('nav-link'))
        ->add(Menu::agregarItem('home','Test de macro'))
        ->submenu(Menu::agregarSubmenu('Test SM'),Menu::new()
            ->addParentClass('nav-item nav-dropdown')
            ->addClass('nav-dropdown-items')
            ->add(Link::to('/', '<i class="nav-icon icon-drop"></i><span>Home</span>')->addParentClass('nav-item')->addClass('nav-link'))
        )
        ->setActiveFromRequest();
});

/**
 * Viejo que se va a borrar despues
 */

Menu::macro('coreuiMenu', function () {
    return Menu::new()
        ->addClass('nav');
});

Menu::macro('menuSeparador', function ($title) {
    return Html::raw($title)->addParentClass('nav-title');
});

Menu::macro('adminlteDefaultMenu', function ($content) {
    return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
});

Menu::macro('test01', function () {
    return Menu::coreuiMenu()
        ->add(Menu::menuSeparador('Testing'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Home</span>')
        ->link('http://www.acacha.org', Menu::adminlteDefaultMenu('Another link'))
//        ->url('http://www.google.com', 'Google')
        ->add(Menu::adminlteSeparator('Acacha Adminlte'))
        #adminlte_menu
        ->add(Menu::adminlteSeparator('SECONDARY MENU'))
        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-share"></i><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('/link1', 'Link1'))->addClass('treeview-menu')
            ->add(Link::to('/link2', 'Link2'))
            ->url('http://www.google.com', 'Google')
            ->add(Menu::new()->prepend('<a href="#"><span>Multilevel 2</span> <i class="fa fa-angle-left pull-right"></i></a>')
                ->addParentClass('treeview')
                ->add(Link::to('/link21', 'Link21'))->addClass('treeview-menu')
                ->add(Link::to('/link22', 'Link22'))
                ->url('http://www.google.com', 'Google')
            )
        )
        ->setActiveFromRequest();
});


//Menu::macro('fullsubmenuexample', function () {
//    return Menu::new()->prepend('<a href="#"><span> Multilevel PROVA </span> <i class="fa fa-angle-left pull-right"></i></a>')
//        ->addParentClass('treeview')
//        ->add(Link::to('/link1prova', 'Link1 prova'))->addClass('treeview-menu')
//        ->add(Link::to('/link2prova', 'Link2 prova'))->addClass('treeview-menu')
//        ->url('http://www.google.com', 'Google');
//});

Menu::macro('adminlteSubmenu', function ($submenuName) {
    return Menu::new()->prepend('<a href="#"><span> ' . $submenuName . '</span> <i class="fa fa-angle-left pull-right"></i></a>')
        ->addParentClass('treeview')->addClass('treeview-menu');
});
Menu::macro('adminlteMenu', function () {
    return Menu::new()
        ->addClass('sidebar-menu')->setAttribute('data-widget','tree');
});
Menu::macro('adminlteSeparator', function ($title) {
    return Html::raw($title)->addParentClass('header');
});

Menu::macro('adminlteDefaultMenu', function ($content) {
    return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
});

Menu::macro('menuAdministrador', function () {
    return Menu::adminlteMenu()
        ->add(Menu::adminlteSeparator('Opciones'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Home</span>')
        ->route('usuarios','Sdfsd')
        ->add(Menu::adminlteSeparator('SECONDARY MENU'))
        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-share"></i><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('/link1', 'Link1'))->addClass('treeview-menu')
            ->add(Link::to('/link2', 'Link2'))
            ->url('http://www.google.com', 'Google')
            ->add(Menu::new()->prepend('<a href="#"><span>Multilevel 2</span> <i class="fa fa-angle-left pull-right"></i></a>')
                ->addParentClass('treeview')
                ->add(Link::to('/link21', 'Link21'))->addClass('treeview-menu')
                ->add(Link::to('/link22', 'Link22'))
                ->url('http://www.google.com', 'Google')
            )
        )
        ->setActiveFromRequest();
});

Menu::macro('sidebar', function () {
    return Menu::adminlteMenu()
        ->add(Html::raw('Opciones')->addParentClass('header'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Home</span>')
        ->link('http://www.acacha.org', Menu::adminlteDefaultMenu('Another link'))
//        ->url('http://www.google.com', 'Google')
        ->add(Menu::adminlteSeparator('Acacha Adminlte'))
        #adminlte_menu
        ->add(Menu::adminlteSeparator('SECONDARY MENU'))
        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-share"></i><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('/link1', 'Link1'))->addClass('treeview-menu')
            ->add(Link::to('/link2', 'Link2'))
            ->url('http://www.google.com', 'Google')
            ->add(Menu::new()->prepend('<a href="#"><span>Multilevel 2</span> <i class="fa fa-angle-left pull-right"></i></a>')
                ->addParentClass('treeview')
                ->add(Link::to('/link21', 'Link21'))->addClass('treeview-menu')
                ->add(Link::to('/link22', 'Link22'))
                ->url('http://www.google.com', 'Google')
            )
        )
//        ->add(
//            Menu::fullsubmenuexample()
//        )
//        ->add(
//            Menu::adminlteSubmenu('Best menu')
//                ->add(Link::to('/acacha', 'acacha'))
//                ->add(Link::to('/profile', 'Profile'))
//                ->url('http://www.google.com', 'Google')
//        )
        ->setActiveFromRequest();
});


