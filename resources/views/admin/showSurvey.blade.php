    @extends('layouts.layout1')

@section ('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
        function loadData() {
           var result = {!! $sr !!};
           if(result.Intern_Paid == "Yes"){
               document.getElementById("paidYes").checked = true;
           }else{
               document.getElementById("paidNo").checked = true;
           }
           if(result.Q1 == "Pantry"){ document.getElementById("Pantry").checked = true;               
           }else if(result.Q1 == "Meals"){  document.getElementById("Meals").checked = true;
           }else if (result.Q1 == "Stipend"){  document.getElementById("Stipend").checked = true;
           }else if (result.Q1 == "Other" ){ document.getElementById("Other").checked = true;}
           
           if(result.Q2 == "5 Strongly Agree"){   document.getElementById("Q25").checked = true;
           }else if(result.Q2 == "4 Agree"){ document.getElementById("Q24").checked = true;
           }else if (result.Q2 == "3 Neuteal"){ document.getElementById("Q23").checked = true;
           }else if (result.Q2 == "2 Disagree"){    document.getElementById("Q22").checked = true;
           }else if(result.Q2 == "1 Strongly Disagree"){    document.getElementById("Q21").checked = true;
               
           }
           if(result.Q3 == "5 Strongly Agree"){   document.getElementById("Q35").checked = true;
           }else if(result.Q3 == "4 Agree"){ document.getElementById("Q34").checked = true;
           }else if (result.Q3 == "3 Neuteal"){ document.getElementById("Q33").checked = true;
           }else if (result.Q3 == "2 Disagree"){    document.getElementById("Q32").checked = true;
           }else if(result.Q3 == "1 Strongly Disagree"){    document.getElementById("Q31").checked = true;
           }
           if(result.Q4 == "5 Strongly Agree"){   document.getElementById("Q45").checked = true;
           }else if(result.Q4 == "4 Agree"){ document.getElementById("Q44").checked = true;
           }else if (result.Q4 == "3 Neuteal"){ document.getElementById("Q43").checked = true;
           }else if (result.Q4 == "2 Disagree"){    document.getElementById("Q42").checked = true;
           }else if(result.Q4 == "1 Strongly Disagree"){    document.getElementById("Q41").checked = true;
           }
           if(result.Q5 == "5 Strongly Agree"){   document.getElementById("Q55").checked = true;
           }else if(result.Q5 == "4 Agree"){ document.getElementById("Q54").checked = true;
           }else if (result.Q5 == "3 Neuteal"){ document.getElementById("Q53").checked = true;
           }else if (result.Q5 == "2 Disagree"){    document.getElementById("Q52").checked = true;
           }else if(result.Q5 == "1 Strongly Disagree"){    document.getElementById("Q51").checked = true;
           }
           if(result.Q6 == "5 Strongly Agree"){   document.getElementById("Q65").checked = true;
           }else if(result.Q6 == "4 Agree"){ document.getElementById("Q64").checked = true;
           }else if (result.Q6 == "3 Neuteal"){ document.getElementById("Q63").checked = true;
           }else if (result.Q6 == "2 Disagree"){    document.getElementById("Q62").checked = true;
           }else if(result.Q6 == "1 Strongly Disagree"){    document.getElementById("Q61").checked = true;
           }
           if(result.Q7 == "5 Strongly Agree"){   document.getElementById("Q75").checked = true;
           }else if(result.Q7 == "4 Agree"){ document.getElementById("Q74").checked = true;
           }else if (result.Q7 == "3 Neuteal"){ document.getElementById("Q73").checked = true;
           }else if (result.Q7 == "2 Disagree"){    document.getElementById("Q72").checked = true;
           }else if(result.Q7 == "1 Strongly Disagree"){    document.getElementById("Q71").checked = true;
           }
           if(result.Q8 == "5 Strongly Agree"){   document.getElementById("Q85").checked = true;
           }else if(result.Q8 == "4 Agree"){ document.getElementById("Q84").checked = true;
           }else if (result.Q8 == "3 Neuteal"){ document.getElementById("Q83").checked = true;
           }else if (result.Q8 == "2 Disagree"){    document.getElementById("Q82").checked = true;
           }else if(result.Q8 == "1 Strongly Disagree"){    document.getElementById("Q81").checked = true;
           }
           if(result.Q9 == "5 Strongly Agree"){   document.getElementById("Q95").checked = true;
           }else if(result.Q9 == "4 Agree"){ document.getElementById("Q94").checked = true;
           }else if (result.Q9 == "3 Neuteal"){ document.getElementById("Q93").checked = true;
           }else if (result.Q9 == "2 Disagree"){    document.getElementById("Q92").checked = true;
           }else if(result.Q9 == "1 Strongly Disagree"){    document.getElementById("Q91").checked = true;
           }
           if(result.Q10 == "5 Strongly Agree"){   document.getElementById("Q105").checked = true;
           }else if(result.Q10 == "4 Agree"){ document.getElementById("Q104").checked = true;
           }else if (result.Q10 == "3 Neuteal"){ document.getElementById("Q103").checked = true;
           }else if (result.Q10 == "2 Disagree"){    document.getElementById("Q102").checked = true;
           }else if(result.Q10 == "1 Strongly Disagree"){    document.getElementById("Q101").checked = true;
           }
           if(result.Q12 == "5 Strongly Agree"){   document.getElementById("Q125").checked = true;
           }else if(result.Q12 == "4 Agree"){ document.getElementById("Q124").checked = true;
           }else if (result.Q12 == "3 Neuteal"){ document.getElementById("Q123").checked = true;
           }else if (result.Q12 == "2 Disagree"){    document.getElementById("Q122").checked = true;
           }else if(result.Q12 == "1 Strongly Disagree"){    document.getElementById("Q121").checked = true;
           }
           if(result.Q11 == "5 Strongly Agree"){   document.getElementById("Q115").checked = true;
           }else if(result.Q11 == "4 Agree"){ document.getElementById("Q114").checked = true;
           }else if (result.Q11 == "3 Neuteal"){ document.getElementById("Q113").checked = true;
           }else if (result.Q11 == "2 Disagree"){    document.getElementById("Q112").checked = true;
            }else if(result.Q11 == "1 Strongly Disagree"){    document.getElementById("Q111").checked = true;
           }
           if(result.Q13 == "Yes"){ document.getElementById("Q13Y").checked = true;
           }else if (result.Q13 == "No"){   document.getElementById("Q13N").checked = true;
           }
           if(result.Q14 == "Highly recommend"){    document.getElementById("Highly recommend").checked = true;
           }else if(result.Q14 == "Recommend"){ document.getElementById("Recommend").checked = true;
           }else if (result.Q14 == "Recommend with reservations"){  document.getElementById("Recommend with reservations").checked = true;
           }else if(result.Q14 == "Would not recommend"){   document.getElementById("Would not recommend").checked = true;}
           if(result.Q15 != ""){
               document.getElementById("commentOfRecommend").value = result.Q15;
           }
           if(result.Q16 != ""){
               document.getElementById("jobsOrDuties").value = result.Q16;
           }
           if(result.Q17 != ""){
               document.getElementById("knowledgeOrSkill").value = result.Q17;
           }
           if(result.Q18 != ""){
               document.getElementById("suggestionsToStudents").value = result.Q18;
           }
           if(result.Q19 != ""){
               document.getElementById("recommendationsToEmployer").value = result.Q19;
           }
           if(result.Q20 != ""){
               document.getElementById("problematicCompany").value = result.Q20;
           }
           
        }
        window.onload = loadData;
        </script>
<div id="all">
    <div id="content">
        <div class="container">
            <div style="height: 60px;">
            <h2>Student Online Survey</h2>
            </div>
            
             <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-navicon"></i> Survey/Feedback </h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li><a href="#">System Feedback</a></li>
                            <li><a href="#">Student Online Survey</a></li>
                        </ul>
                    </div>
                    
                    

                </div>
                </div>
            <div class="col-md-9">
                
              <div class="form-group">
                <label>ID:</label>
                <input readonly name="stdName" value="<?php echo $sr->Q2 ?> " type="text" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Gender:</label>
                <input readonly name="gender" value="<?php echo $sr->Gender ?>" type="text" class="form-control" required/>
              </div>  
              <div class="form-group">
                <label>Company Name:</label>
                <input readonly name="cmpName" value="<?php echo $sr->Cmp_Name?>" type="text" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Program:</label>
                <input readonly name="programCode" value="<?php echo $sr->Prog_Code?>" type="text" class="form-control" required/>
              </div>
               <div class="form-group">
                <label for="paid" style="width:200px;">Was the internship paid?:</label>
                <label  class="radio-inline"><input disabled="true" type="radio" id="paidYes" value="Yes" >Yes</label>  
                    <label class="radio-inline"><input disabled="true" type="radio" id="paidNo" value="No" >No</label>
            
              </div>
              <div class="form-group">
                <label for="compensation" style="width:200px;">Did you receive any other form of compensation?:</label>
                <label class="radio-inline"><input disabled="true" type="checkbox" id="Pantry" value="Pantry" >Pantry</label>
                <label class="radio-inline"><input disabled="true" type="checkbox" id="Meals" value="Meals">Meals</label>
                <label class="radio-inline"><input disabled="true" type="checkbox" id="Stipend" value="Stipend">Stipend</label>
                <label class="radio-inline"><input disabled="true" type="checkbox" id="Other" value="Other">Other</label>
              </div>
                <div class="form-group">
                <label for="realisticPreview" style="width:200px;">This experience gave me a realistic preview of this career field:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q25" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q24" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q23" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q22" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q21" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="haveUnderstanding" style="width:200px;">As a result of my internship, I have a better understanding of concepts, theories, and skills in my course of study:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q35" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q34" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q33" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q32" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q31" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="projectTraining" style="width:200px;">I was given adequate training or explanation of  projects:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q45" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q44" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q43" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q42" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q41" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="supervisorMeeting" style="width:200px;">I had regular meetings with my supervisors and received constructive, on-going feedback:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q55" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q54" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q53" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q52" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q51" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="responsibilityLevel" style="width:200px;">I was provided levels of responsibility consistent with my ability and was given additional responsibility as my experience increased:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q65" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q64" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q63" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q62" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q61" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="supervisorAvailability" style="width:200px;">My supervisor was available and accessible when i had questions / concerns:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q75" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q74" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q73" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q72" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q71" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="challengingStimulating" style="width:200px;">The work I perform was challenging and stimulating:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q85" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q84" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q83" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q82" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q81" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="sameTreated" style="width:200px;">I was treated on the same level as other employees:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q95" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q94" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q93" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q92" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q91" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="coworkerRelationship" style="width:200px;">I had a good relationship with my coworker:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q105" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q104" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q103" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q102" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q101" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="learningOpportunity" style="width:200px;">There ware ample of opportunities for learning:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q115" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q114" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q113" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q112" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q111" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="preparation" style="width:200px;">I feel that I am better prepared to enter the world of work after this experience:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q125" value="5 Strongly Agree" >5 Strongly Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q124" value="4 Agree">4 Agree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q123" value="3 Neuteal">3 Neutral</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q122" value="2 Disagree">2 Disagree</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q121" value="1 Strongly Disagree">1 Strongly Disagree</label>
              </div>
                <div class="form-group">
                <label for="jobOffered" style="width:200px;">Were you offered a full-time or permanent position with the organization providing the internship:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q13Y" value="Yes" >Yes</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Q13N" value="No">No</label>
              </div>
                <div class="form-group">
                <label for="recommendation" style="width:200px;">Would you recommend the company to other students:</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Highly recommend" value="Highly recommend" >Highly recommend</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Recommend" value="Recommend">Recommend</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Recommend with reservations" value="Recommend with reservations">Recommend with reservations</label>
                <label class="radio-inline"><input disabled="true" type="radio" id="Would not recommend" value="Would not recommend">Would not recommend</label>
              </div>
              <div class="form-group">
                <label for="feedback">Why? Please provide comment(max 200 word):</label>
                <textarea class="form-control" maxlength="200" rows="5" id="commentOfRecommend"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">What are the jobs/duties assigned during your internship?:</label>
                <textarea class="form-control" maxlength="200" rows="5" id="jobsOrDuties"></textarea>
                <div class="form-group">
                <label for="feedback">Do you find the knowledge/skills that you learned from TARUC can be applied during your internship?:</label>
                <textarea class="form-control" maxlength="200" rows="5" id="knowledgeOrSkill"></textarea>
              </div>
                </div>
                <div class="form-group">
                <label for="feedback">What suggestions would you give to students who may intern at this organization in the future?:</label>
                <textarea class="form-control" maxlength="200" rows="5" id="suggestionsToStudents"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">What recommendations would you give to the employer for future internship?:</label>
                <textarea class="form-control" maxlength="200" rows="5" id="recommendationsToEmployer"></textarea>
              </div>
                <div class="form-group">
                <label for="feedback">Is a problematic company need instant site visit?(State your reasons):</label>
                <textarea class="form-control" maxlength="200" rows="5" id="problematicCompany"></textarea>
              </div>
               
                </div>
        </div>
    </div>
</div>
 
@endsection
