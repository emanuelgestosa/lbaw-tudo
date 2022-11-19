# Tu-Do 

## Project Components

* [ER: Requirements Specification](docs/er.md)
* [EBD: Database Specification](docs/ebd.md)
* [EAP: Architecture Specification and Prototype](docs/eap)
* [PA: Product and Presentation](docs/pa)

## Team

* Emanuel Silva Gestosa, up202005485@edu.fe.up.pt
* José Leandro Rodrigues da Silva, up202008061@edu.fe.up.pt
* Mariana Solange Monteiro Rocha, up202004656@edu.fe.up.pt
* Martim Afonso Rodrigues dos Santos Castro Videira, up202006289@edu.fe.up.pt

***
GROUP2215, 21/09/2022

## Notas 

- Mass assignment vulnerability

????
We are also going to place these routes behind two middleware:

The auth middleware ensures that only logged-in users can access the route.
The verified middleware will be used if you decide to enable email verification.

Composite" Primary Keys
Eloquent requires each model to have at least one uniquely identifying "ID"
that can serve as its primary key. "Composite" primary keys are not supported
by Eloquent models. However, you are free to add additional multi-column,
unique indexes to your database tables in addition to the table's uniquely
identifying primary key

## Building Queries
The Eloquent all method will return all of the results in the
model's table. However, since each Eloquent model serves as a
query builder, you may add additional constraints to queries and
then invoke the get method to retrieve the results:

Some Eloquent notes:
```php
<?
$flights = Flight::where('active', 1)
               ->orderBy('name')
               ->take(10)
               ->get();

// Retrieve a model by its primary key...
$flight = Flight::find(1);
 
// Retrieve the first model matching the query constraints...
$flight = Flight::where('active', 1)->first();
 
// Alternative to retrieving the first model matching the query constraints...
$flight = Flight::firstWhere('active', 1);
// More queries
return Destination::addSelect(['last_flight' => Flight::select('name')
    ->whereColumn('destination_id', 'destinations.id')
    ->orderByDesc('arrived_at')
    ->limit(1)
])->get();

// We can define which keys to use  ->>
return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
```

More Notes on eloquent building queries with more abstractions

```php
<?php
use App\Models\Post;
 
$posts = Post::where('user_id', $user->id)->get();

// However, you may find it more convenient to use the
// whereBelongsTo method, which will automatically determine the
// proper relationship and foreign key for the given model:
$posts = Post::whereBelongsTo($user)->get();

// You may also provide a collection instance to the whereBelongsTo
// method. When doing so, Laravel will retrieve models that belong
// to any of the parent models within the collection:
$users = User::where('vip', true)->get();
$posts = Post::whereBelongsTo($users)->get();

```
