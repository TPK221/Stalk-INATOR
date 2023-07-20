@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Leaderboard</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="table-responsive" data-toggle="lists" data-lists-values='["studentName"]'>
            <table class="table custom-table">
                <thead class="thead-light">
                    <br><br>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Student Name</th>
                        <th style="text-align: center">Student ID</th>
                        <th style="text-align: center">Points Obtained</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($leaderboardData as $row)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td style="text-align: center">{{ $row->fullName }}</td>
                        <td style="text-align: center">{{ $row->studentID }}</td>
                        <td style="text-align: center">{{ $row->totalPoints }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <h4 class="flex m-0 text-info">No one's being a stalker at the moment</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .custom-table,
    .inner-table {
        border-collapse: collapse;
        width: 100%;
    }

    .custom-table th,
    .inner-table th {
        background-color: #f2f2f2; 
        padding: 10px;
        border: 1px solid #ccc; 
    }

    .custom-table td,
    .inner-table td {
        padding: 10px;
        border: 1px solid #ccc; 
    }

    .custom-table tr:nth-child(even),
    .inner-table tr:nth-child(even) {
        background-color: #f9f9f9; 
    }

    .custom-table tr:hover,
    .inner-table tr:hover {
        background-color: #e6e6e6; 
    }

    .custom-table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
    }

    .custom-table thead th {
        vertical-align: middle;
        border-bottom: 2px solid #dee2e6;
    }

    .custom-table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .custom-table .table {
        background-color: #fff;
    }

    .custom-table .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .custom-table .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .custom-table .table-primary,
    .custom-table .table-primary>th,
    .custom-table .table-primary>td {
        background-color: #c6e0f5;
    }

    .custom-table .table-hover .table-primary:hover {
        background-color: #b0d4f1;
    }

    .custom-table .table-hover .table-primary:hover>td,
    .custom-table .table-hover .table-primary:hover>th {
        background-color: #b0d4f1;
    }
</style>

@endsection
