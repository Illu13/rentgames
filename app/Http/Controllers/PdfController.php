<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function showPdfView()
    {
        $gameId = session('game_id');
        $game = Game::findOrFail($gameId);
        // Obtener los datos necesarios para la vista
        $data = [
            'game' => $game
        ];

        // Renderizar la vista existente y pasar los datos
        $html = view('games.gamePdf', $data)->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Devolver el PDF como respuesta
        return $dompdf->stream('documento.pdf');
    }
}
