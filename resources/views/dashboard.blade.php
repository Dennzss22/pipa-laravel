@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data inventaris gudang')

@section('content')
<div class="space-y-6">

    {{-- Filter Bar --}}
    <div class="flex flex-wrap items-center gap-2">
        @php $filters = ['today' => 'Hari Ini', 'yesterday' => 'Kemarin', 'month' => 'Bulan Ini', 'all' => 'Semua']; @endphp
        @foreach($filters as $key => $label)
        <a href="?filter={{ $key }}"
           class="rounded-lg px-3.5 py-2 text-xs font-semibold transition-all duration-200 {{ $filter === $key ? 'bg-spindo-600 text-white shadow-lg shadow-spindo-600/25' : 'bg-white text-steel-600 ring-1 ring-steel-200 hover:bg-steel-50 hover:ring-steel-300' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        {{-- Total Opname --}}
        <div class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100 transition-all duration-300 hover:shadow-md hover:ring-steel-200">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-blue-50 transition-transform duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15a2.25 2.25 0 0 1 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                </div>
                <p class="mt-3 text-2xl font-extrabold text-steel-900">{{ number_format($totalOpnames) }}</p>
                <p class="text-xs text-steel-500">Total Record</p>
            </div>
        </div>

        {{-- Total Bundle --}}
        <div class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100 transition-all duration-300 hover:shadow-md hover:ring-steel-200">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-emerald-50 transition-transform duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                </div>
                <p class="mt-3 text-2xl font-extrabold text-steel-900">{{ number_format($totalBundles) }}</p>
                <p class="text-xs text-steel-500">Total Bundle</p>
            </div>
        </div>

        {{-- Total Pcs --}}
        <div class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100 transition-all duration-300 hover:shadow-md hover:ring-steel-200">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-amber-50 transition-transform duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25a2.25 2.25 0 0 1-2.25-2.25v-2.25Z"/></svg>
                </div>
                <p class="mt-3 text-2xl font-extrabold text-steel-900">{{ number_format($totalPcs) }}</p>
                <p class="text-xs text-steel-500">Total Pcs</p>
            </div>
        </div>

        {{-- Total Berat --}}
        <div class="group relative overflow-hidden rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100 transition-all duration-300 hover:shadow-md hover:ring-steel-200">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-purple-50 transition-transform duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971ZM5.25 4.97 7.87 15.696c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.97Z"/></svg>
                </div>
                <p class="mt-3 text-2xl font-extrabold text-steel-900">{{ number_format($totalWeight, 0) }}</p>
                <p class="text-xs text-steel-500">Total KG</p>
            </div>
        </div>
    </div>

    {{-- Warehouse Cards & Chart --}}
    <div class="grid gap-6 lg:grid-cols-3">
        {{-- Warehouse Progress --}}
        <div class="lg:col-span-2 space-y-4">
            <h3 class="text-sm font-bold text-steel-700">Progress per Gudang</h3>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach($warehouses as $wh)
                @php $stat = $warehouseStats[$wh->id] ?? ['counted' => 0, 'total' => 0, 'pct' => 0, 'total_pcs' => 0, 'total_bundles' => 0]; @endphp
                <a href="{{ route('warehouse.show', $wh->id) }}"
                   class="group rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100 transition-all duration-300 hover:shadow-md hover:ring-spindo-200 hover:-translate-y-0.5">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-sm font-bold text-steel-800">{{ $wh->name }}</h4>
                        <span class="rounded-full bg-steel-100 px-2 py-0.5 text-[10px] font-bold text-steel-600 group-hover:bg-spindo-50 group-hover:text-spindo-600 transition-colors">
                            {{ $stat['counted'] }}/{{ $stat['total'] }} Blok
                        </span>
                    </div>

                    {{-- Progress Bar --}}
                    <div class="mb-3 h-2 overflow-hidden rounded-full bg-steel-100">
                        <div class="h-full rounded-full transition-all duration-700 {{ $stat['pct'] >= 100 ? 'bg-emerald-500' : ($stat['pct'] >= 50 ? 'bg-blue-500' : 'bg-amber-500') }}"
                             style="width: {{ $stat['pct'] }}%"></div>
                    </div>

                    <div class="flex items-center justify-between text-xs text-steel-500">
                        <span>{{ number_format($stat['total_bundles']) }} bdl</span>
                        <span class="font-bold {{ $stat['pct'] >= 100 ? 'text-emerald-600' : 'text-steel-700' }}">{{ $stat['pct'] }}%</span>
                        <span>{{ number_format($stat['total_pcs']) }} pcs</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        {{-- 7-Day Chart --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100">
            <h3 class="mb-4 text-sm font-bold text-steel-700">Tren 7 Hari</h3>
            <canvas id="trendChart" height="200"></canvas>
        </div>
    </div>

    {{-- Recent Activity & Top Categories --}}
    <div class="grid gap-6 lg:grid-cols-3">
        {{-- Recent Activity --}}
        <div class="lg:col-span-2 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100">
            <h3 class="mb-4 text-sm font-bold text-steel-700">Aktivitas Terbaru</h3>
            @if($recentActivities->isEmpty())
            <p class="py-8 text-center text-sm text-steel-400">Belum ada aktivitas</p>
            @else
            <div class="space-y-3">
                @foreach($recentActivities as $act)
                <div class="flex items-center gap-3 rounded-xl bg-steel-50 p-3 transition-colors hover:bg-steel-100">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-spindo-100 text-spindo-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="truncate text-sm font-medium text-steel-800">
                            {{ $act->block?->warehouse?->name }} · Blok {{ $act->block?->code }}
                        </p>
                        <p class="text-xs text-steel-500">
                            {{ $act->pipeSize?->size_label ?? '-' }} · {{ $act->petugas_name }} · {{ $act->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <span class="shrink-0 text-sm font-bold text-steel-700">{{ $act->total_bundles }} bdl</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Top Categories --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-steel-100">
            <h3 class="mb-4 text-sm font-bold text-steel-700">Top 3 Kategori</h3>
            @if($topCategories->isEmpty())
            <p class="py-8 text-center text-sm text-steel-400">Belum ada data</p>
            @else
            <div class="space-y-4">
                @foreach($topCategories as $i => $cat)
                @php $colors = ['bg-spindo-500', 'bg-blue-500', 'bg-amber-500']; @endphp
                <div>
                    <div class="mb-1.5 flex items-center justify-between">
                        <span class="text-sm font-medium text-steel-700">{{ $cat['name'] }}</span>
                        <span class="text-sm font-bold text-steel-900">{{ number_format($cat['bundles']) }}</span>
                    </div>
                    <div class="h-2 overflow-hidden rounded-full bg-steel-100">
                        <div class="h-full rounded-full {{ $colors[$i] ?? 'bg-steel-400' }} transition-all duration-700"
                             style="width: {{ $topCategories->max('bundles') > 0 ? round(($cat['bundles'] / $topCategories->max('bundles')) * 100) : 0 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            {{-- Operator Stats --}}
            @if(!empty($opnameUsers))
            <h3 class="mb-3 mt-6 border-t border-steel-100 pt-4 text-sm font-bold text-steel-700">Operator Aktif</h3>
            <div class="space-y-2">
                @foreach($opnameUsers as $whName => $users)
                    @foreach($users as $name => $count)
                    <div class="flex items-center justify-between rounded-lg bg-steel-50 px-3 py-2">
                        <div>
                            <p class="text-xs font-medium text-steel-700">{{ $name }}</p>
                            <p class="text-[10px] text-steel-400">{{ $whName }}</p>
                        </div>
                        <span class="rounded-full bg-spindo-100 px-2 py-0.5 text-[10px] font-bold text-spindo-700">{{ $count }}</span>
                    </div>
                    @endforeach
                @endforeach
            </div>
            @endif
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('trendChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Total Bundle',
                    data: @json($chartData['data']),
                    backgroundColor: 'rgba(220, 38, 38, 0.15)',
                    borderColor: 'rgb(220, 38, 38)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.04)' },
                        ticks: { font: { size: 10 } },
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 10 } },
                    }
                }
            }
        });
    }
</script>
@endpush
