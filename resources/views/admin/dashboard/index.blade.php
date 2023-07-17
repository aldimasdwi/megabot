@extends('admin.layouts.master')

@section('title', __('static.dashboard.dashboard'))

@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-6 col-12">
            <a href="{{ route('user.index') }}" class="card o-hidden widget-cards">
                <div class="card-body ps-0">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">{{ __('static.dashboard.total_users') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $total_users }}</span><small></small>
                            </h3>
                        </div>
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i class="ri-group-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-sm-6 col-12">
            <a href="{{ route('character.index') }}" class="card o-hidden widget-cards">
                <div class="card-body ps-0">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">{{ __('static.dashboard.total_character') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $total_characters }}</span><small></small>
                            </h3>
                        </div>
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i class="ri-emotion-line"></i></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-body">
                            <h5>{{ __('static.dashboard.total_users_of_this_week') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="userWeeklyChart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-body">
                            <h5>{{ __('static.dashboard.daily_chat_average') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="averageChatChart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-body">
                            <h5>{{ __('static.dashboard.recent_users') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive recent-user">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('static.dashboard.avatar') }}</th>
                                    <th scope="col">{{ __('static.name') }}</th>
                                    <th scope="col">{{ __('static.dashboard.email_id') }}</th>
                                    <th scope="col">{{ __('static.dashboard.phone') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recent_users as $user)
                                    <tr>
                                        <td><img class="user-image"
                                                src="{{ isset($user->profile_image_url) ? $user->profile_image_url : asset('admin/images/avatar/profile.jpg') }}"
                                                alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="not-found">{{ __('static.dashboard.user_not_found') }}</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-body">
                            <h5>{{ __('static.dashboard.character_list') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body character-body custom-scroll">
                    <div class="character-detail">
                        @forelse ($character_list as $character)
                            <div class="character-list">
                                <div class="character-item">
                                    <p class="mb-0 text-truncate">{{ $character->name }}</p>
                                    <div class="character-icon">
                                        <span></span>
                                        <img src="{{ $character->image_url }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6 class="not-found">{{ __('static.dashboard.no_characters_found') }}</h6>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/js/apex-chart.js') }}"></script>
    <script>
        var dayNames = {!! json_encode($userCounts->pluck('day_of_week')) !!};
        var userCountsData = {!! json_encode($userCounts->pluck('total_users')) !!};
        // User Weekly Chart
        var userWeeklyChart = {
            series: [{
                name: 'Users',
                data: userCountsData
            }],
            chart: {
                toolbar: {
                    show: false,
                },
                type: 'bar',
                height: 350,
            },
            grid: {
                padding: {
                    bottom: -10,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '16%',
                    startingShape: '0',
                    borderRadius: 8,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#00CCB4"],
            xaxis: {
                categories: dayNames,
            },
            fill: {
                opacity: 1
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'right',
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
            responsive: [{
                breakpoint: 1401,
                options: {
                    chart: {
                        height: 300,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '20%',
                            borderRadius: 6,
                        },
                    },
                },
            }, {
                breakpoint: 1200,
                options: {
                    chart: {
                        height: 290,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '12%',
                            borderRadius: 5,
                        },
                    },
                },
            }, {
                breakpoint: 992,
                options: {
                    chart: {
                        height: 250,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '21%',
                        },
                    },
                },
            }, {
                breakpoint: 768,
                options: {
                    chart: {
                        height: 270,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '15%',
                            borderRadius: 5,
                        },
                    },
                },
            }, {
                breakpoint: 481,
                options: {
                    chart: {
                        height: 250,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '20%',
                        },
                    },
                },
            }]
        };
        var userWeeklyChart = new ApexCharts(
            document.querySelector("#userWeeklyChart"),
            userWeeklyChart
        );
        userWeeklyChart.render();


        // Average Chat Chart
        var chatData = @json($chatData);
        var formattedDates = chatData.map(item => {
            var date = new Date(item.message_at);
            return `${date.toLocaleString('default', { month: 'short' })} ${date.getDate()}`;
        });
        var averageChatChart = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },

            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Chats',
                data: chatData.map(item => item.chat_count)
            }],
            grid: {
                padding: {
                    bottom: -10,
                },
            },
            markers: {
                fillColor: '#3AEDB1',
                strokeColor: '#ffffff',
                size: 5,
                sizeOffset: 4
            },
            theme: {
                palette: 'palette4',
                monochrome: {
                    enabled: true,
                    color: '#3AEDB1',
                    shadeTo: 'light',
                    shadeIntensity: 0.65
                },
            },

            xaxis: {
                categories: formattedDates,
            },
            tooltip: {
                enabled: true,
                shared: false,
                fillSeriesColor: true
            },
            responsive: [{
                breakpoint: 1401,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            }, {
                breakpoint: 1200,
                options: {
                    chart: {
                        height: 290,
                    },
                },
            }, {
                breakpoint: 992,
                options: {
                    chart: {
                        height: 250,
                    },
                },
            }, {
                breakpoint: 905,
                options: {
                    grid: {
                        padding: {
                            bottom: -20,
                        },
                    },
                },
            }, {
                breakpoint: 768,
                options: {
                    chart: {
                        height: 270,
                    },
                },
            }, {

                breakpoint: 481,
                options: {
                    chart: {
                        height: 250,
                    },
                    grid: {
                        padding: {
                            bottom: -30,
                        },
                    },
                },
            }]
        }

        var averageChatChart = new ApexCharts(document.querySelector("#averageChatChart"), averageChatChart);
        averageChatChart.render();
    </script>
@endpush
