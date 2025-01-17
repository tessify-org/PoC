@extends("layouts.app")

@section("breadcrumbs")
    {!! Breadcrumbs::render("ministries.view", $ministry) !!}
@stop

@section("content")
    <div id="ministry">

        <!-- Page header -->
        <div id="page-header" class="narrow light">
            <div id="page-header__bg"></div>
            <div id="page-header__content">
                <div id="page-header__content-wrapper">
                    <h1 id="page-header__title" class="no-margin" style="margin-left: -5px;">{{ $ministry->name }}</h1>
                </div>
            </div>
            <div id="page-header__actions-wrapper">
                <div id="page-header__actions" class="align-right">
                    @if (!Auth::user()->hasSubscribed($ministry))
                        <v-btn color="white" href="{{ route('ministries.subscribe', ['slug' => $ministry->slug]) }}">
                            <i class="fas fa-check-circle"></i>
                            @lang("ministries.view_subscribe")
                        </v-btn>
                    @else
                        <v-btn color="white" href="{{ route('ministries.unsubscribe', ['slug' => $ministry->slug]) }}">
                            <i class="fas fa-times-circle"></i>
                            @lang("ministries.view_unsubscribe")
                        </v-btn>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content -->
        <div id="ministry-content">
            <div class="content-section__wrapper">
                <div class="content-section">
                
                    <!-- Feedback -->
                    @include("partials.feedback")

                    <!-- Content -->
                    <div class="content-card elevation-1 mb">
                        <div class="content-card__content">
                            <h3 class="content-subtitle">@lang("ministries.view_details")</h3>
                            <div class="details no-padding mb-0">
                                <!-- Name -->
                                <div class="detail">
                                    <div class="key">@lang("ministries.view_name")</div>
                                    <div class="val">{{ $ministry->name }}</div> 
                                </div>
                                <!-- Abbreviation -->
                                <div class="detail">
                                    <div class="key">@lang("ministries.view_abbreviation")</div>
                                    <div class="val">{{ $ministry->abbreviation }}</div> 
                                </div>
                                <!-- Description -->
                                <div class="detail">
                                    <div class="key">@lang("ministries.view_description")</div>
                                    <div class="val">{{ $ministry->description }}</div> 
                                </div>
                                <!-- Website -->
                                <div class="detail">
                                    <div class="key">@lang("ministries.view_website")</div>
                                    <div class="val">
                                        <a href="{{ $ministry->website_url }}" target="_blank">
                                            {{ $ministry->website_url }}
                                        </a>
                                    </div> 
                                </div>
                                <!-- Last updated on -->
                                <div class="detail">
                                    <div class="key">@lang("ministries.view_last_update")</div>
                                    <div class="val">{{ $ministry->updated_at->format("d-m-Y H:m:s") }}</div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Organizations -->
                    <div class="content-card elevation-1 mb">
                        <div class="content-card__content">
                            <h3 class="content-subtitle">@lang("ministries.view_organizations")</h3>
                            <div id="ministry-organizations">
                                @if ($ministry->organizations->count())
                                    <div id="organizations">
                                        @foreach ($ministry->organizations as $organization)
                                            <div class="organization-wrapper">
                                                <a class="organization" href="{{ route('organizations.view', $organization->slug) }}">
                                                    <div class="organization-name">{{ $organization->name }}</div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div id="no-organizations">
                                        @lang("ministries.view_no_organizations")
                                    </div>  
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="content-card elevation-1 mb">
                        <div class="content-card__content">
                            <h3 class="content-subtitle">@lang("ministries.view_projects")</h3>
                            <div id="ministry-projects">
                                @if ($ministry->projects->count())
                                    <div id="projects">
                                        @foreach ($ministry->projects as $project)
                                            <div class="project-wrapper">
                                                <a class="project" href="{{ route('projects.view', $project->slug) }}">
                                                    <div class="project-title">{{ $project->title }}</div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div id="no-projects">
                                        @lang("ministries.view_no_projects")
                                    </div>  
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="content-card elevation-1">
                        <div class="content-card__content">
                            <h3 class="content-subtitle">@lang("ministries.view_tasks")</h3>
                            <div id="ministry-tasks">
                                @if ($ministry->tasks->count())
                                    <div id="tasks">
                                        @foreach ($ministry->tasks as $task)
                                            <div class="task-wrapper">
                                                <a class="task" href="{{ route('tasks.view', $task->slug) }}">
                                                    <div class="task-title">{{ $task->title }}</div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div id="no-tasks">
                                        @lang("ministries.view_no_tasks")
                                    </div>  
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@stop