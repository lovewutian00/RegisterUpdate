@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')
            
            <div class="col-md-9">
                <div class="box">
                    <div class="pull-right">
                        @if($studDetail->Avatar=='default.jpg')
                            @if($studDetail->Gender=='Male')
                                <img src="{{ asset('storage/default-male.png')}}" style="width:150px;height:150px;" />
                            @elseif($studDetail->Gender=='Female')
                                <img src="{{ asset('storage/default-female.png')}}" style="width:150px;height:150px;" />
                            @else
                                <img src="{{ asset('storage/default.png')}}" style="width:150px;height:150px;" />
                            @endif
                        @else
                            <img src="{{ asset('storage/Avatars/Students/'.$studDetail->Avatar)}}" style="width:180px;height:150px;" />
                        @endif
                    </div>
                    
                    <h3>{{$studDetail->LastName}} {{$studDetail->FirstName}}</h3>
                    <p><b>{{$program->Program_Name}}</b></p>
                    <p><b>Tunku Abdul Rahman University College(TARUC)</b></p>
                    <p><b>Phone:</b> {{$studDetail->ContactNo}} | <b>Email:</b> {{$studDetail->Email}} </p>
                    <p><b>Gender:</b> {{$studDetail->Gender}} | <b>Place:</b>{{$studDetail->City}},{{$studDetail->State}},{{$studDetail->Country}}</p>
                    
                    <hr>
                    @if(count($exps))
                    <div class="col-sm-12">
                        <label style="font-size: 24px">Experience</label> </br>                        
                        <table>
                            @foreach($exps as $exp)
                            <tr>
                                <td style="width: 200px;">{{$exp->Joined_Frm->format('M Y')}} - {{$exp->Joined_To->format('M Y')}}</td>
                                <td><b>{{$exp->Position_Title}}</b> <br>{{$exp->Company_Name}} | {{$exp->Country}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <table  class='desc_css'>
                                        <tr>
                                            <td style="width: 150px;">Industry</td>
                                            <td>{{$exp->Industry}}</td>
                                        </tr> 
                                        <tr>
                                            <td>Position_Lvl</td>
                                            <td>{{$exp->Position_Lvl}}</td>
                                        </tr>
                                        <tr>
                                            <td>Monthly Salary Range</td>
                                            <td>{{$exp->Salary_Range}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{{$exp->Description}}</td>
                                        </tr>
                                    </table>    
                                </td>
                            </tr>
                            @endforeach
                        </table>        
                    </div> 
                    @endif
                    
                    @if(count($edus))
                    <div class="col-sm-12">
                        <hr>
                        <label style="font-size: 24px">Education</label> </br>                        
                        <table>
                            @foreach($edus as $edu)
                            <tr>
                                <td style="width: 200px;">{{$edu->Grad_Date->format('M Y')}}</td>
                                <td><b>{{$edu->University}}</b> <br> {{$edu->Qualification}} in {{$edu->Field_Of_Study}} | {{$edu->Uni_Location}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <table class='desc_css'>
                                        <tr>
                                            <td style="width: 150px;">Major</td>
                                            <td>{{$edu->Major}}</td>
                                        </tr> 
                                        <tr>
                                            <td>Grade</td>
                                            <td>{{$edu->Grade}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{{$edu->Additional_Info}}</td>
                                        </tr>
                                    </table>    
                                </td>
                            </tr>
                            @endforeach
                        </table>        
                    </div>
                    @endif
                    
                    @if(count($skillBeginner) || count($skillIntermediate) || count($skillAdvanced))
                    <div class="col-sm-12">
                        <hr>
                        <label style="font-size: 24px">Skill</label> </br>                        
                        <table>
                            @if(count($skillBeginner))
                            <tr>
                                <td style="width: 200px;">
                                    Beginner
                                </td>
                                <td>
                                    @foreach($skillBeginner as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                            @if(count($skillIntermediate))
                            <tr>
                                <td style="width: 200px;">
                                    Intermediate
                                </td>
                                <td>
                                    @foreach($skillIntermediate as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                            @if(count($skillAdvanced))
                            <tr>
                                <td style="width: 200px;">
                                    Advanced
                                </td>
                                <td>
                                    @foreach($skillAdvanced as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                        </table>        
                    </div>
                    @endif
                        
                    @if(count($languages))
                    <div class="col-sm-12">
                        <hr>
                        <label style="font-size: 24px">Language</label> </br>     
                        <p style="font-size: 14px;">Proficiency Level: 1 - Poor, 5 - Excellent</p>
                        <table>
                            <thead>
                            <th style='width:200px;'>Language</th>
                            <th style='width:150px;'>Spoken</th>
                            <th style='width:150px;'>Written</th>
                            </thead>
                            <tbody>
                                @foreach($languages as $lg)
                                <tr>
                                    <td>{{$lg->Language}}</td>
                                    <td>{{$lg->Spoken}}</td>
                                    <td>{{$lg->Written}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>        
                    </div>
                    @endif
                        
                    @if(count($add_infos))
                    <div class="col-sm-12">
                        <hr>
                        <label style="font-size: 24px">Additional Info</label> </br>     
                        <table class='desc_css'>
                            @foreach($add_infos as $infos)
                            <tr>
                                <td style='width:200px;'>
                                    Expected Salary
                                </td>
                                <td>
                                    MYR {{$infos->Expected_Salary}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Preferred Work Location
                                </td>
                                <td>
                                    {{$infos->Preferred_Location_one}}
                                    @if($infos->Preferred_Location_two !=null)
                                    ,{{$infos->Preferred_Location_two}}
                                    @endif
                                    @if($infos->Preferred_Location_three != null)
                                    ,{{$infos->Preferred_Location_three}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Working Oversea
                                </td>
                                <td>
                                    @if($infos->Oversea == true)
                                        yes
                                    @else
                                        no
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>{{$infos->Other_Info}}</td>
                            </tr>
                            @endforeach
                        </table>        
                    </div>
                    @endif
                    
                    <div class="row">
                    </div>         
                </div>
            </div>
            
        </div>
    </div>
</div>

@stop