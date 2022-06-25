<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'products', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'slug' );
            $table->integer( 'quantily' )->default( 1 );
            $table->integer( 'price' )->default( 1000 );
            $table->boolean( 'actived' )->default( true );
            $table->string( 'cover' )->default( '' );
            $table->unsignedBigInteger( 'category_id' )->index();
            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'cascade' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'products' );
    }
}
