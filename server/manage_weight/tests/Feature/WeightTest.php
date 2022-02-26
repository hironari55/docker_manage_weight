<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Carbon;

class WeightTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        Parent::setUp();

        $this->seed('WeightsTableSeeder');
    }


    /**
     * 記録作成画面にて体重管理の日付が日付ではない場合はバリデーションエラー
     * @test
     */

    public function date_should_be_date()
    {
        $response = $this->post('weights/create', [
            'date' => 123,
            'weight' => 55.3,
        ]);

        $response->assertSessionHasErrors([
            'date' => '日付 で入力してください。',
        ]);
    }

    /**
     * 記録作成画面にて体重管理の日付が明日以降の場合はバリデーションエラー
     * @test
     */

    public function date_should_be_before_date()
    {
        $response = $this->post('weights/create', [
            'date' => Carbon::tomorrow(),
            'weight' => 55.3,
        ]);

        $response->assertSessionHasErrors([
            'date' => '日付 は今日以前で入力してください。',
        ]);
    }

    /**
     * 編集画面にて体重管理の日付が日付ではない場合はバリデーションエラー
     * @test
     */

    public function edit_date_manage_weight_should_be_date()
    {
        $this->seed('WeightsTableSeeder');

        $response = $this->post('/weights/1/edit', [
            'date' => 123,
            'weight' => 55.3,
        ]);

        $response->assertSessionHasErrors([
            'date' => '日付 で入力してください。',
        ]);
    }

    /**
     * 編集画面にて体重管理の日付が明日以降の場合はバリデーションエラー
     * @test
     */

    public function edit_date_should_be_before_date()
    {
        $response = $this->post('/weights/1/edit', [
            'date' => Carbon::tomorrow(),
            'weight' => 55.3,
        ]);

        $response->assertSessionHasErrors([
            'date' => '日付 は今日以前で入力してください。',
        ]);
    }

}
