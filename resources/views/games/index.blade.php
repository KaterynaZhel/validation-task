<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Games</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<div class="card-header">
    <h3 class="card-title">Ігри</h3>
</div>
<div class="card-body">
    <div id="celebrants_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row mb-3">

        </div>

        <div class="row">
            <div class="col-sm-12">
                <table id="celebrants" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="celebrants_info">
                    <thead>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                game_id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                sport
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                game_date
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                start_time</th>

                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                end_time</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                home_team
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                away_team</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                age_group
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                gender
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                classification
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                venue</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                city</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                state
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                first_name</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                last_name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                position
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                pay_type</th>

                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                base_fee</th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                mileage
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="celebrants" rowspan="1" colspan="1">
                                other</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{ $game->id }}</td>
                            <td>{{ $game->game_id }}</td>
                            <td>{{ $game->sport}}</td>
                            <td>{{ $game->game_date }}</td>
                            <td>{{ $game->start_time }}</td>
                            <td>{{ $game->end_time }}</td>
                            <td>{{ $game->home_team }}</td>
                            <td>{{ $game->away_team }}</td>
                            <td>{{ $game->age_group }}</td>
                            <td>{{ $game->gender }}</td>
                            <td>{{ $game->classification }}</td>
                            <td>{{ $game->venue }}</td>
                            <td>{{ $game->city }}</td>
                            <td>{{ $game->state }}</td>
                            <td>{{ $game->first_name }}</td>
                            <td>{{ $game->last_name }}</td>
                            <td>{{ $game->email }}</td>
                            <td>{{ $game->position }}</td>
                            <td>{{ $game->pay_type }}</td>
                            <td>{{ $game->base_fee }}</td>
                            <td>{{ $game->mileage }}</td>
                            <td>{{ $game->other }}</td>


                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">id</th>
                            <th rowspan="1" colspan="1">game_id</th>
                            <th rowspan="1" colspan="1">game_date</th>
                            <th rowspan="1" colspan="1">start_time</th>
                            <th rowspan="1" colspan="1">end_time</th>
                            <th rowspan="1" colspan="1">home_team</th>
                            <th rowspan="1" colspan="1">away_team</th>
                            <th rowspan="1" colspan="1">age_group</th>
                            <th rowspan="1" colspan="1">gender</th>
                            <th rowspan="1" colspan="1">classification</th>
                            <th rowspan="1" colspan="1">venue</th>
                            <th rowspan="1" colspan="1">city</th>
                            <th rowspan="1" colspan="1">state</th>
                            <th rowspan="1" colspan="1">first_nameя</th>
                            <th rowspan="1" colspan="1">last_name</th>
                            <th rowspan="1" colspan="1">email</th>
                            <th rowspan="1" colspan="1">position</th>
                            <th rowspan="1" colspan="1">pay_type</th>
                            <th rowspan="1" colspan="1">base_fee</th>
                            <th rowspan="1" colspan="1">mileage</th>
                            <th rowspan="1" colspan="1">other</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>