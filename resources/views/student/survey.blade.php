@extends('layouts.layout1')

@section ('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="all">
    <div id="content">
        <div class="container">
            <div class="form-group">
                    @if ($errors->any())
                   
                    @endif
            </div>
            <div style="height: 60px;">
            <h2>Student Online Survey</h2>
            </div>
            
             <div class="col-md-2">
                </div>
            <div class="col-md-9">
                <form method="post" action="/student/survey/surSubmit" >
                            {{csrf_field()}}
                            {{ method_field('patch') }}
              <div class="form-group">
                <label>Name:</label>
                <input readonly name="stdName" value="<?php echo $stud->LastName ?> <?php echo $stud->FirstName ?>" type="text" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Gender:</label>
                <input readonly name="gender" value="Male" type="text" class="form-control" required/>
              </div>  
              <div class="form-group">
                <label>Company Name:</label>
                <input readonly name="cmpName" value="<?php echo $cmp->Cmp_Name?>" type="text" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Program:</label>
                <input readonly name="programCode" value="<?php echo $stud->Program_Code?>" type="text" class="form-control" required/>
              </div>
               <div class="form-group">
                <label for="paid" style="width:200px;">Was the internship paid?:</label>
                <label class="radio-inline"><input required type="radio" name="paid" value="Yes" >Yes</label>
                <label class="radio-inline"><input type="radio" name="paid" value="No">No</label>
              </div>
              <div class="form-group">
                <label for="compensation" style="width:200px;">Did you receive any other form of compensation?:</label>
                <label class="radio-inline"><input required type="checkbox" name="compensation" value="Pantry" >Pantry</label>
                <label class="radio-inline"><input type="checkbox" name="compensation" value="Meals">Meals</label>
                <label class="radio-inline"><input type="checkbox" name="compensation" value="Stipend">Stipend</label>
                <label class="radio-inline"><input type="checkbox" name="compensation" value="Other">Other</label>
              </div>
                <div class="form-group">
                <label for="realisticPreview" style="width:200px;">This experience gave me a realistic preview of this career field:</label>
                <label class="radio-inline"><input required type="radio" name="experience" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="experience" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="experience" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="experience" value="2 Disagree">2 Disagree</label>
                    <label class="radio-inline"><input type="radio" name="experience" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="haveUnderstanding" style="width:200px;">As a result of my internship, I have a better understanding of concepts, theories, and skills in my course of study:</label>
                <label class="radio-inline"><input required type="radio" name="understanding" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="understanding" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="understanding" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="understanding" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="understanding" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="projectTraining" style="width:200px;">I was given adequate training or explanation of  projects:</label>
                <label class="radio-inline"><input required type="radio" name="trainOrExp" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="trainOrExp" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="trainOrExp" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="trainOrExp" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="trainOrExp" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="supervisorMeeting" style="width:200px;">I had regular meetings with my supervisors and received constructive, on-going feedback:</label>
                <label class="radio-inline"><input required type="radio" name="onGoingFeedback" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="onGoingFeedback" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="onGoingFeedback" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="onGoingFeedback" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="onGoingFeedback" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="responsibilityLevel" style="width:200px;">I was provided levels of responsibility consistent with my ability and was given additional responsibility as my experience increased:</label>
                <label class="radio-inline"><input required type="radio" name="responsibility" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="responsibility" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="responsibility" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="responsibility" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="responsibility" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="supervisorAvailability" style="width:200px;">My supervisor was available and accessible when i had questions / concerns:</label>
                <label class="radio-inline"><input required type="radio" name="quesOrConcerns" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="quesOrConcerns" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="quesOrConcerns" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="quesOrConcerns" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="quesOrConcerns" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="challengingStimulating" style="width:200px;">The work I perform was challenging and stimulating:</label>
                <label class="radio-inline"><input required type="radio" name="chalAndStimulate" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="chalAndStimulate" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="chalAndStimulate" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="chalAndStimulate" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="chalAndStimulate" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="sameTreated" style="width:200px;">I was treated on the same level as other employees:</label>
                <label class="radio-inline"><input required type="radio" name="treated" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="treated" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="treated" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="treated" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="treated" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="coworkerRelationship" style="width:200px;">I had a good relationship with my coworker:</label>
                <label class="radio-inline"><input required type="radio" name="relationWCoworker" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="relationWCoworker" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="relationWCoworker" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="relationWCoworker" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="relationWCoworker" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="learningOpportunity" style="width:200px;">There ware ample of opportunities for learning:</label>
                <label class="radio-inline"><input required type="radio" name="oppForLearn" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="oppForLearn" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="oppForLearn" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="oppForLearn" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="oppForLearn" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="preparation" style="width:200px;">I feel that I am better prepared to enter the world of work after this experience:</label>
                <label class="radio-inline"><input required type="radio" name="prepareToEnterWorld" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input type="radio" name="prepareToEnterWorld" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input type="radio" name="prepareToEnterWorld" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input type="radio" name="prepareToEnterWorld" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input type="radio" name="prepareToEnterWorld" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="jobOffered" style="width:200px;">Were you offered a full-time or permanent position with the organization providing the internship:</label>
                <label class="radio-inline"><input required type="radio" name="offerWork" value="Yes" >Yes</label>
                <label class="radio-inline"><input type="radio" name="offerWork" value="No">No</label>
              </div>
                <div class="form-group">
                <label for="recommendation" style="width:200px;">Would you recommend the company to other students:</label><br/>
                <label class="radio-inline"><input required type="radio" name="recommend" value="Highly recommend" >Highly recommend</label>
                <label class="radio-inline"><input type="radio" name="recommend" value="Recommend">Recommend</label>
                <label class="radio-inline"><input type="radio" name="recommend" value="Recommend with reservations">Recommend with reservations</label>
                <label class="radio-inline"><input type="radio" name="recommend" value="Would not recommend">Would not recommend</label>
              </div>
              <div class="form-group">
                <label for="feedback">Why? Please provide comment(max 200 word):</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="commentOfRecommend"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">What are the jobs/duties assigned during your internship?:</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="jobsOrDuties"></textarea>
                <div class="form-group">
                <label for="feedback">Do you find the knowledge/skills that you learned from TARUC can be applied during your internship?:</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="knowledgeOrSkill"></textarea>
              </div>
                </div>
                <div class="form-group">
                <label for="feedback">What suggestions would you give to students who may intern at this organization in the future?:</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="suggestionsToStudents"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">What recommendations would you give to the employer for future internship?:</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="recommendationsToEmployer"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">Is a problematic company need instant site visit?(State your reasons):</label>
                <textarea required class="form-control" maxlength="200" rows="5" name="problematicCompany"></textarea>
              </div>
                
                <button type="submit" name="action" value="Save Info" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                
            </form>
                
                </div>
        </div>
    </div>
</div>
 
@endsection