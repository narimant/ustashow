<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(__('messages.Home'), route('index'));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('index');
    $trail->push($category->name, route('categories.index', $category));
});

Breadcrumbs::for('article', function (BreadcrumbTrail $trail, \App\Article $article) {
    $trail->parent('index');
    $trail->push($article->title, route('articles.index', $article));
});

Breadcrumbs::for('tag', function (BreadcrumbTrail $trail, \App\Tag $tag) {
    $trail->parent('index');
    $trail->push($tag->name, route('tag.show', $tag));
});