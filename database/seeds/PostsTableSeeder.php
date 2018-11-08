<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		Storage::disk('public')->deleteDirectory('posts');			//filesystems.php
    Post::truncate();
    Category::truncate();
    Tag::truncate();

    $category = new Category;
    $category->name = "Laravel";
    $category->save();

    $category = new Category;
    $category->name = "PHP";
    $category->save();

    $category = new Category;
    $category->name = "JavaScript";
    $category->save();

		$category = new Category;
		$category->name = "VueJS";
		$category->save();

		$category = new Category;
		$category->name = "Django";
		$category->save();

		$category = new Category;
		$category->name = "Explore";
		$category->save();

		$category = new Category;
		$category->name = "Watch";
		$category->save();

		$category = new Category;
		$category->name = "Live";
		$category->save();

		$category = new Category;
		$category->name = "Give";
		$category->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 1";
    $tag->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 2";
    $tag->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 3";
    $tag->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 4";
    $tag->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 5";
    $tag->save();

    $tag = new Tag;
    $tag->name = "Etiqueta 6";
    $tag->save();

		$post = new Post;
		$post->title = "Lorem ipsum";
		$post->url =str_slug("Lorem ipsum");
		$post->excerpt = "Extracto de Lorem ipsum";
		$post->body = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.";
		$post->published_at = Carbon::now()->subDays(4);
		$post->category_id = 1;
		$post->user_id = 1;
		$post->save();
		//$post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));

		$post = new Post;
		$post->title = "Cicero";
		$post->url =str_slug("Cicero");
		$post->excerpt = "Cicero";
		$post->body = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.";
		$post->published_at = Carbon::now()->subDays(2);
		$post->category_id = 2;
		$post->user_id = 1;
		$post->save();

		$post = new Post;
		$post->title = "Li Europan lingues";
		$post->url =str_slug("Li Europan lingues");
		$post->excerpt = "Li Europan";
		$post->body = "Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.";
		$post->published_at = Carbon::now()->subDays(1);
		$post->category_id = 3;
		$post->user_id = 2;
		$post->save();

		$post = new Post;
		$post->title = "Muy lejos, más allá...";
		$post->url =str_slug("Muy lejos, más allá...");
		$post->excerpt = "Muy lejos";
		$post->body = "Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias. Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca.";
		$post->published_at = Carbon::now();
		$post->category_id = 4;
		$post->user_id = 2;
		$post->save();

		$post = new Post;
		$post->title = "No difference how many peaks you reach if there was no pleasure in the climb.";
		$post->url = str_slug($post->title);
		$post->excerpt = "Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.";
		$post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p> <p> Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
		$post->published_at = Carbon::now()->subDays(4);
		$post->category_id = 5;
		$post->user_id = 1;
		$post->save();

		$post = new Post;
		$post->title = "You know, I'd rather argue with you, then laugh with anyone else.";
		$post->url = str_slug($post->title);
		$post->excerpt = "Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.";
		$post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue.</p><p> Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p><p> Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
		$post->published_at = '2017-1-08'; //Carbon::now()->subDays(3);
		$post->category_id = 6;
		$post->user_id = 1;
		$post->save();


		$post = new Post;
		$post->title = "Everything in the universe has a rhythm, everything dances.";
		$post->url = str_slug($post->title);
		$post->excerpt = "Donec hendrerit magna vitae metus viverra tincidunt. Cras dolor lacus, placerat sed nulla in, egestas pharetra neque. Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. Cras laoreet pulvinar dapibus. Nulla laoreet odio at nunc semper vestibulum. Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.";
		$post->body = "<p>Donec hendrerit magna vitae metus viverra tincidunt. Cras dolor lacus, placerat sed nulla in, egestas pharetra neque.</p><p> Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.</p>";
		$post->published_at = '2017-1-08'; //Carbon::now()->subDays(2);
		$post->category_id = 1;
		$post->user_id = 2;
		$post->save();

		$post = new Post;
		$post->title = "As human beings, we have a natural compulsion to fill empty spaces.";
		$post->url = str_slug($post->title);
		$post->excerpt = "Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.";
		$post->body = "<p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. </p><p> Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. </p><p>Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.</p><p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. </p><p> Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. </p><p>Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.</p>";
		$post->published_at = '2017-1-08'; //Carbon::now()->subDays(1);
		$post->category_id = 2;
		$post->user_id = 2;
		$post->save();

		// Llenar la tabla post_tag
		for ($i=1; $i <=8 ; $i++) {
			$post = Post::find($i);

			for ($j=1; $j <=2 ; $j++) {
				// Asignarle al Post un id de la Etiqueta (Tag)
				// attach - Adjuntar
				$post->tags()->attach(rand(1, 6));
			}
		}
	}
}