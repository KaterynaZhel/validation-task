<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('id', 'desc')->paginate(25);

        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Перевірка наявності та правильного формату завантаженого файлу
        $request->validate([
            'file' => 'required|file|mimes:csv',
        ], [
            'file.required' => 'The file could not be downloaded.',
            'file.file' => 'Incorrect file format.',
            'file.mimes' => 'File format must be CSV.',
        ]);

        // Отримуємо файл, завантажений через форму, з запиту
        $file = $request->file('file');
        // Отримуємо вміст файлу як масив рядків
        $fileContents = file($file->getPathname());

        // Відстежуємо, чи ми перейшли перший рядок
        $firstLineSkipped = false;

        // Проходимося по кожному рядку вмісту файлу
        foreach ($fileContents as $line) {
            // Перевіряємо, чи ми перейшли перший рядок
            if (!$firstLineSkipped) {
                // Пропускаємо перший рядок
                $firstLineSkipped = true;
                continue;
            }

            // Розбиваємо рядок на масив значень за допомогою коми (CSV)
            $data = str_getcsv($line);

            // Перетворюємо формат дати
            $game_date = $data[2];
            // Перетворити дату в об'єкт DateTime
            $date_object = \DateTime::createFromFormat('d/m/y', $game_date);
            // Отримати нове значення у форматі 'Y-d-m'
            $new_game_date = $date_object->format('Y-d-m');

            // Створюємо нову гру у базі даних, використовуючи зчитані дані
            Game::create([
                'game_id' => $data[0],
                'sport' => $data[1],
                'game_date' => $new_game_date,
                'start_time' => $data[3],
                'end_time' => $data[4],
                'home_team' => $data[5],
                'away_team' => $data[6],
                'age_group' => $data[7],
                'gender' => $data[8],
                'classification' => $data[9],
                'venue' => $data[10],
                'city' => $data[11],
                'state' => $data[12],
                'first_name' => $data[13],
                'last_name' => $data[14],
                'email' => $data[15],
                'position' => $data[16],
                'pay_type' => $data[17],
                'base_fee' => $data[18],
                'mileage' => $data[19],
                'other' => $data[20],

            ]);

        }

        // Після завершення імпорту повертаємо користувача назад на попередню сторінку
        // з повідомленням про успішний імпорт
        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }

    /**
     * Data validation
     */
    public function validation(ValidationRequest $request)
    {
        return redirect()->back()->withSuccess('success');
    }


}
