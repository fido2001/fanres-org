@extends('frontend.app')

@section('content')
    <div class="container">
        <h3 class="my-3">Jadwal Acara</h3>
        <?php $tgl = Carbon\Carbon::now();
        $hari = Carbon\Carbon::parse($tgl)->translatedFormat("l"); ?> 
        <div class="mobile-ver">
            <select id="days-selector" class="form-control">
                <option value="list-senin" {{ $hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="list-selasa" {{ $hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="list-rabu" {{ $hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="list-kamis" {{ $hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="list-jumat" {{ $hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                <option value="list-sabtu" {{ $hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                <option value="list-minggu" {{ $hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
            </select>
        </div>
        <div class="desktop">
            <ul>
                <li id="hari-senin" class="{{ $hari == 'Senin' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Senin</li>
                <li id="hari-selasa" class="{{ $hari == 'Selasa' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Selasa</li>
                <li id="hari-rabu" class="{{ $hari == 'Rabu' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Rabu</li>
                <li id="hari-kamis" class="{{ $hari == 'Kamis' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Kamis</li>
                <li id="hari-jumat" class="{{ $hari == 'Jumat' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Jumat</li>
                <li id="hari-sabtu" class="{{ $hari == 'Sabtu' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Sabtu</li>
                <li id="hari-minggu" class="{{ $hari == 'Minggu' ? 'genric-btn info radius' : 'genric-btn info-border radius' }}">Minggu</li>
            </ul>
        </div>
        <div id="list-senin" class="days progress-table-wrap" style="display:{{ $hari == 'Senin' ? 'block' : 'none' }}" >
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalSenin as $senin)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $senin->mulai }} - {{ $senin->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $senin->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-selasa" class="days progress-table-wrap" style="display:{{ $hari == 'Selasa' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalSelasa as $selasa)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $selasa->mulai }} - {{ $selasa->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $selasa->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-rabu" class="days progress-table-wrap" style="display:{{ $hari == 'Rabu' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalRabu as $rabu)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $rabu->mulai }} - {{ $rabu->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $rabu->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-kamis" class="days progress-table-wrap" style="display:{{ $hari == 'Kamis' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalKamis as $kamis)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $kamis->mulai }} - {{ $kamis->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $kamis->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-jumat" class="days progress-table-wrap" style="display:{{ $hari == 'Jumat' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalJumat as $jumat)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $jumat->mulai }} - {{ $jumat->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $jumat->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-sabtu" class="days progress-table-wrap" style="display:{{ $hari == 'Sabtu' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalSabtu as $sabtu)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $sabtu->mulai }} - {{ $sabtu->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $sabtu->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="list-minggu" class="days progress-table-wrap" style="display:{{ $hari == 'Minggu' ? 'block' : 'none' }}">
            <div class="progress-table" style="min-width: 370px">
                <div class="table-head">
                    {{-- <div class="serial">#</div> --}}
                    <div class="country" style="width: 30%">Pukul</div>
                    <div class="visit" style="width: 70%">Nama Acara</div>
                </div>
                @foreach ($jadwalMinggu as $minggu)
                <div class="table-row" style="padding: 15px 0">
                    {{-- <div class="serial">01</div> --}}
                    <div class="country" style="width: 30%">{{ $minggu->mulai }} - {{ $minggu->selesai }}</div>
                    <div class="visit" style="width: 70%">{{ $minggu->acara }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection