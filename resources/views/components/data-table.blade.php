@props(['columns', 'rows', 'badges' => [], 'perPage' => 8, 'searchable' => true, 'showActions' => true])

<div class="cd" x-data="{ search: '' }">
    {{-- Card Header --}}
    <div class="cd-hd">
        @if($searchable)
            <div class="cd-sr">
                <span class="material-icons-outlined">search</span>
                <input type="text" placeholder="Cari data..." x-model="search" @input="$el.dispatchEvent(new Event('search'))">
            </div>
        @endif
        <button class="btn btn-p" onclick="toast('Fitur tambah data','info')">
            <span class="material-icons-outlined">add</span>
            <span>Tambah</span>
        </button>
    </div>

    {{-- Table --}}
    <div class="cd-bd" style="overflow-x:auto">
        <table class="tw">
            <thead>
                <tr>
                    <th>No</th>
                    @foreach($columns as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                    @if($showActions)
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $idx => $row)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        @foreach($columns as $colIdx => $col)
                            @php
                                $cellValue = is_array($row) ? ($row[$colIdx] ?? '') : (is_object($row) ? ($row->{$colIdx} ?? '') : '');
                                $badgeClass = isset($badges[$colIdx][$cellValue]) ? $badges[$colIdx][$cellValue] : '';
                            @endphp
                            <td>
                                @if($badgeClass)
                                    <span class="bdg {{ $badgeClass }}">{{ $cellValue }}</span>
                                @else
                                    {{ $cellValue }}
                                @endif
                            </td>
                        @endforeach
                        @if($showActions)
                            <td>
                                <div class="td-act">
                                    <button class="btn-ic" title="Lihat" onclick="toast('Lihat detail data','info')">
                                        <span class="material-icons-outlined">visibility</span>
                                    </button>
                                    <button class="btn-ic" title="Edit" onclick="toast('Edit data','info')">
                                        <span class="material-icons-outlined">edit</span>
                                    </button>
                                    <button class="btn-ic btn-ic-d" title="Hapus" onclick="toast('Hapus data','warning')">
                                        <span class="material-icons-outlined">delete</span>
                                    </button>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + 1 + ($showActions ? 1 : 0) }}" class="td-empty">
                            <div class="td-emc">
                                <span class="material-icons-outlined" style="font-size:48px;opacity:.3">inbox</span>
                                <span>Tidak ada data</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
