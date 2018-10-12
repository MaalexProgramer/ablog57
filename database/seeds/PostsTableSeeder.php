<?php

use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Post::truncate();
    Category::truncate();

    $category = new Category;
    $category->name = "Categoría 1";
    $category->save();

    $category = new Category;
    $category->name = "Categoría 2";
    $category->save();

    $category = new Category;
    $category->name = "Categoría 3";
    $category->save();

    $post = new Post;
    $post->title = "Lorem ipsum";
    $post->excerpt = "Extracto de Lorem ipsum";
    $post->body = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.";
    $post->published_at = Carbon::now()->subDays(4);
    $post->category_id = 1;
    $post->save();

    $post = new Post;
    $post->title = "Cicero";
    $post->excerpt = "Cicero";
    $post->body = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.";
    $post->published_at = Carbon::now()->subDays(2);
    $post->category_id = 2;
    $post->save();

    $post = new Post;
    $post->title = "Li Europan lingues";
    $post->excerpt = "Li Europan";
    $post->body = "Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.";
    $post->published_at = Carbon::now()->subDays(1);
    $post->category_id = 2;
    $post->save();

    $post = new Post;
    $post->title = "Muy lejos, más allá...";
    $post->excerpt = "Muy lejos";
    $post->body = "Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias. Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca.";
    $post->published_at = Carbon::now();
    $post->category_id = 1;
    $post->save();
  }
}