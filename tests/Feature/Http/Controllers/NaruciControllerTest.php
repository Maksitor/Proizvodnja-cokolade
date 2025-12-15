<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NaruciController
 */
final class NaruciControllerTest extends TestCase
{
    #[Test]
    public function web_behaves_as_expected(): void
    {
        $response = $this->get(route('narucis.web'));

        $response->assertSessionHas('public', $public);
    }
}
