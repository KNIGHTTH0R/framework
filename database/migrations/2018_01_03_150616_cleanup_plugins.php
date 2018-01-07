<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CleanupPlugins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('carousels');
        Schema::drop('carousel_slides');
        Schema::drop('images');
        Schema::drop('notifications');
        Schema::drop('articles');
        Schema::drop('plugin_feeds');
        Schema::drop('plugin_options');

        $plugin = app(\App\Classes\Repositories\PluginRepository::class);

        $plugin->whereName('carousels')->delete();
        $plugin->whereName('news')->delete();
        $plugin->whereName('facebook')->delete();

        $item = $plugin->whereName('menus');
        $item->setVersion('2.6')->setRequired(false)->save();
        $item = $plugin->whereName('pages');
        $item->setVersion('2.1')->setRequired(false)->save();
        $item = $plugin->whereName('redirects');
        $item->setVersion('1.9')->setEnabled(false)->setRequired(false)->save();
        $item = $plugin->whereName('products');
        $item->setVersion('1.3')->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
