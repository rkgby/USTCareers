@extends('layouts.user_layout')

@section('content')

<div class="w3-row">
    <div class="container">
        <section id="fancyTabWidget" class="tabs t-tabs">
            <ul class="nav nav-tabs fancyTabs" role="tablist">

                <li class="tab fancyTab active">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span
                            class="hidden-xs">Contact Information</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-graduation-cap"></span><span
                            class="hidden-xs">Education</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-user-circle"></span><span
                            class="hidden-xs">Experience</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-users"></span><span
                            class="hidden-xs">Involvement</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-eye"></span><span class="hidden-xs">Visual
                            Appeal</span></a>
                    <div class="whiteBlock"></div>
                </li>

                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab5" href="#tabBody5" role="tab" aria-controls="tabBody5" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-sitemap"></span><span
                            class="hidden-xs">Organization of Content</span></a>
                    <div class="whiteBlock"></div>
                </li>


                <li class="tab fancyTab">
                    <div class="arrow-down">
                        <div class="arrow-down-inner"></div>
                    </div>
                    <a id="tab6" href="#tabBody6" role="tab" aria-controls="tabBody6" aria-selected="true"
                        data-toggle="tab" tabindex="0"><span class="fa fa-comments"></span><span
                            class="hidden-xs">Grammar, Spelling, and Punctuation</span></a>
                    <div class="whiteBlock"></div>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0"
                    aria-hidden="false" tabindex="0">
                    <div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="w3-row">
                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        <h3>Tiger Ready</h3>

                                        <p>{{$contact1}}</p>

                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        <h3>Almost Ready</h3>
                                        <p>{{$contact2}}</p>
                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        <h3>Not Ready</h3>
                                        <p>{{$contact3}}</p>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12">
                                <h3>Comments:</h3>
                                {!!$contact_comment!!}
                            </div>


                        </div>
                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true"
                    tabindex="0">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$educ1}}</p>
                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$educ2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$educ3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$educ_comment!!}
                        </div>


                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true"
                    tabindex="0">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$experience1}}</p>

                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$experience2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$experience3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$experience_comment!!}
                        </div>

                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true"
                    tabindex="0">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$involvement1}}</p>

                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$involvement2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$involvement3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$involvement_comment!!}
                        </div>

                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true"
                    tabindex="0">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$visual1}}</p>

                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$visual2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$visual3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$visual_comment!!}
                        </div>

                    </div>
                </div>
                <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true"
                    tabindex="0">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$organization1}}</p>

                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$organization2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$organization3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$organization_comment!!}
                        </div>

                    </div>
                </div>

                <div class="tab-pane  fade" id="tabBody6" role="tabpanel" aria-labelledby="tab6" aria-hidden="true"
                    tabindex="0">
                    <div class="row">


                        <div class="col-md-12">
                            <div class="w3-row">
                                <!--COL 1 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Tiger Ready</h3>
                                    <p>{{$grammar1}}</p>

                                </div>
                                <!--COL 2 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Almost Ready</h3>
                                    <p>{{$grammar2}}</p>

                                </div>
                                <!--COL 3 -->
                                <div class="w3-col s4 ">
                                    <!-- insert content here-->
                                    <h3>Not Ready</h3>
                                    <p>{{$grammar3}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            {!!$grammar_comment!!}
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</div>
<script src="{{asset('js/jquery2.1.3.min.js')}}"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>



<script src="{{asset('assets/summary/js/index.js')}}"></script>


@stop

@extends('layouts.user_footer')