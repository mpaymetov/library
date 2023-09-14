<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

echo "<pre>";
    echo "id: " . $book->id . "\n";
    echo "name: " . $book->name . "\n";
    echo "year: " . $book->year . "\n";
    echo "genre_id: " . $book->genre_id . "\n";
    echo "genre: " . $book->genre->name . "\n";
    echo "genre link: " . \yii\helpers\Url::to(['genre/view', 'id' => $book->genre->id]) . "\n";
    echo "author_id: " . $book->author_id . "\n";
    echo "author: " . $book->author->name . "\n";
    echo "author link: " . \yii\helpers\Url::to(['author/view', 'id' => $book->author->id]) . "\n";
    echo "page_count: " . $book->page_count . "\n";
    echo "description: " . $book->description . "\n";
    echo "created_at: " . $book->created_at . "\n";
    //echo "view link: " . \yii\helpers\Url::to(['book/view', 'id' => $book->id]) . "\n";
    //echo "-------\n";
echo "</pre>";
?>