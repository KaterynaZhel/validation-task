<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file1' => 'required|file|mimes:csv|max:10000',
        ];
    }


    //    

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {

            $file = $this->file('file1');

            if ($file && $file->isValid()) {
                $fileContents = file($file->getPathname());
                // Відстежуємо, чи ми перейшли перший рядок
                $firstLineSkipped = false;

                $games = [];

                foreach ($fileContents as $line) {

                    if (!$firstLineSkipped) {
                        // Пропускаємо перший рядок
                        $firstLineSkipped = true;
                        continue;
                    }


                    $data = str_getcsv($line);

                    $game_id        = $data[0];
                    $sport          = $data[1];
                    $game_date      = $data[2];
                    $start_time     = $data[3];
                    $end_time       = $data[4];
                    $home_team      = $data[5];
                    $away_team      = $data[6];
                    $age_group      = $data[7];
                    $gender         = $data[8];
                    $classification = $data[9];
                    $venue          = $data[10];



                    // Перевірка, чи ми вже мали цей game_id
                    if (isset ($games[$game_id])) {

                        // Перевірка, чи співпадають значення sport, game_date, start_time...
                        $errorAdded = false; // Прапорець для перевірки, чи вже додано "All assignments" повідомлення

                        if (
                            $games[$game_id]['sport'] !== $sport ||
                            $games[$game_id]['game_date'] !== $game_date ||
                            $games[$game_id]['start_time'] !== $start_time ||
                            $games[$game_id]['end_time'] !== $end_time ||
                            $games[$game_id]['home_team'] !== $home_team ||
                            $games[$game_id]['away_team'] !== $away_team ||
                            $games[$game_id]['age_group'] !== $age_group ||
                            $games[$game_id]['gender'] !== $gender ||
                            $games[$game_id]['classification'] !== $classification ||
                            $games[$game_id]['venue'] !== $venue
                        ) {

                            if (!$errorAdded) {
                                // Додати "All assignments" повідомлення як перший рівень помилок
                                $validator->errors()->add(null, "All assignments under $game_id Game_ ID should have similar data in all fields");
                                $errorAdded = true;
                            }

                            // Додати конкретну помилку для кожного поля
                            if ($games[$game_id]['sport'] !== $sport) {
                                $validator->errors()->add('sport', 'Cannot have some Game ID and different Sport');
                            }
                            if ($games[$game_id]['game_date'] !== $game_date) {
                                $validator->errors()->add('game_date', 'Cannot have some Game ID and different Game Date');
                            }
                            if ($games[$game_id]['start_time'] !== $start_time) {
                                $validator->errors()->add('start_time', 'Cannot have some Game ID and different Start Time');
                            }
                            if ($games[$game_id]['end_time'] !== $end_time) {
                                $validator->errors()->add('end_time', 'Cannot have some Game ID and different End Time');
                            }
                            if ($games[$game_id]['home_team'] !== $home_team) {
                                $validator->errors()->add('home_team', 'Cannot have some Game ID and different Home Team');
                            }
                            if ($games[$game_id]['away_team'] !== $away_team) {
                                $validator->errors()->add('away_team', 'Cannot have some Game ID and different Away Teame');
                            }
                            if ($games[$game_id]['age_group'] !== $age_group) {
                                $validator->errors()->add('age_group', 'Cannot have some Game ID and different Age Group');
                            }
                            if ($games[$game_id]['gender'] !== $gender) {
                                $validator->errors()->add('gender', 'Cannot have some Game ID and different Gender');
                            }
                            if ($games[$game_id]['classification'] !== $classification) {
                                $validator->errors()->add('classification', 'Cannot have some Game ID and different Classification');
                            }
                            if ($games[$game_id]['venue'] !== $venue) {
                                $validator->errors()->add('venue', 'Cannot have some Game ID and different Venue');
                            }
                        }

                    } else {
                        // Зберігаємо значення sport, game_date, start_time... для цього $game_id
                        $games[$game_id] = [
                            'sport' => $sport,
                            'game_date' => $game_date,
                            'start_time' => $start_time,
                            'end_time' => $end_time,
                            'home_team' => $home_team,
                            'away_team' => $away_team,
                            'age_group' => $age_group,
                            'gender' => $gender,
                            'classification' => $classification,
                            'venue' => $venue,

                        ];
                    }
                }
                // });
            } else {
                // Обробка випадку, коли файл не був завантажений або не є дійсним
                $validator->errors()->add('file1', 'The file is missing or invalid.');
            }
        });
    }
}