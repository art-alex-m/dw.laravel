<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArticleViewTotalView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->removeView());
    }

    /**
     * @return string
     */
    protected function removeView(): string
    {
        return 'drop view is exists article_view_total';
    }

    /**
     * @return string
     */
    protected function createView(): string
    {
        return <<<SQL
create or replace view article_view_total as
select av.article_id, sum(av.value) as total
from article_views av 
group by av.article_id
SQL;
    }
}
