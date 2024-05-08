<!DOCTYPE html>
<html>
<head>
  <title>{{$application->fullName}} Application</title>
</head>
<body style=" font-family: Verdana, sans-serif; font-size: 16px; line-height: 1.5; margin: 0; padding: 0;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style=" color: #fff; display: flex; justify-content:center; align-items: center; margin:0px;">
            <h2 style="font-weight: bold; color: #070c54;margin:0px;font-family: 'Times New Roman', Times, serif">
            {{ $application->fullName }} Application
            </h2>
        </div>
        <p style="color:#007bff;font-size:26px; margin:0px;"> {{ $application->startupName }}</p> 
        <h3 style=" font-size:x-large; padding:0px; margin:0px; font-weight: bold; color: #767d85;font-family: 'Times New Roman', Times, serif">Personal Details</h3>

    <div style="">
        <ul class="padding:0px; margin:0px;">
            <li style="margin:2px">Full Name:<span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                {{$application->fullName}}
                </span>
            </li>
            <li style="margin:2px">Birth Year:<span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                {{$application->birthYear}}
                </span>
            </li>
            <li style="margin:2px">NIDA Number:<span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                {{$application->nidaNumber}}
                </span>
            </li>
            <li style="margin:2px">Contact:
                <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                Phone Number: {{$application->phoneNumber}}
                </span>
                <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                Email: {{$application->phoneNumber}}
                </span>
            </li>
            <li style="margin:2px">Education Level: <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                {{$application->educationLevel}}
                </span>
            </li>
            <li style="margin:2px">Business Registration Status: 
                @if ($application->BusinessRegStatus === "1")
                    <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #0f8334; border-radius: 0.25rem; position:relative;left:20px; ">
                        Yes
                    </span>
                @endif
                @if ($application->BusinessRegStatus === "0")
                    <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #e62e2e; border-radius: 0.25rem; position:relative;left:20px; ">
                        No
                    </span>
                @endif
            </li>
                @if ($application->BusinessRegStatus === "1")
                <li style="margin:2px">Business Name: <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #08606a; border-radius: 0.25rem; position:relative;left:20px; ">
                    {{$application->businessName}}
                    </span>
                </li>
                <li style="margin:2px">Business Sector: <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #08606a; border-radius: 0.25rem; position:relative;left:20px; ">
                    {{$application->businessSector}}
                    </span>
                </li>
                <li style="margin:2px">Business Location: <span style="padding: 0.2rem; font-size: 0.8rem;font-weight: bold; color: #fff; background-color: #08606a; border-radius: 0.25rem; position:relative;left:20px; ">
                    {{$application->businessLocation}}
                    </span>
                </li>
                @endif
           
        </ul>
    </div>
  <div style=" padding-top:2rem;">
    @if ($businessDetails)
        <div style="flex-basis: calc(50% - 1rem);">
            <h3 style=" font-size:x-large; font-weight: bold; color: #767d85;font-family: 'Times New Roman', Times, serif; padding:0px; margin:0px;">
                Business Details</h3>
            <div class="margin-top:.3rem;">
                <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                    <b>Business Background: </b></p>
                <p style="margin:0px; padding:0px;">
                    {{ $businessDetails->background ?? ''}}</p>
            </div> 
            <div class="margin-top:.3rem;">
                <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                    <b> market Problem: </b></p>
                <p style="margin:0px; padding:0px;">
                    {{ $businessDetails->marketProblem ?? ''}}</p>
            </div> 
            <div class="margin-top:.3rem;">
                <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                    <b> Market Base: </b></p>
                <p style="margin:0px; padding:0px;">
                    {{ $businessDetails->marketBase ?? ''}}</p>
            </div> 
            <div class="margin-top:.3rem;">
                <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                    <b> Prototype Description: </b></p>
                <p style="margin:0px; padding:0px;">
                    {{ $businessDetails->prototypeDescription ?? ''}}</p>
            </div> 
            <div class="margin-top:.3rem;">
                <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                    <b> Market size: </b></p>
                <p style="margin:0px; padding:0px;">
                    {{ $businessDetails->marketSize ?? ''}}</p>
            </div> 
        </div>
    @endif

  </div>
  <div style=" padding-top:2rem;">
        @if ($competitorsDetails)
            <div style="flex-basis: calc(50% - 1rem);">
                <h3 style=" font-size:x-large; font-weight: bold; color: #767d85;font-family: 'Times New Roman', Times, serif; padding:0px; margin:0px;">
                    Business Competition Details</h3>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Business Competitors: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $competitorsDetails->competitors ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Competitors Advantage: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $competitorsDetails->competitiveAdvantage ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Market Strategy: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $competitorsDetails->marketStrategy ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Team Capacity: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $competitorsDetails->teamCapacity ?? ''}}</p>
                </div>
            </div>
        @endif
  </div>
  <div style=" padding-top:2rem;">
        @if ($projectionDetails)
            <div style="flex-basis: calc(50% - 1rem);">
                <h3 style=" font-size:x-large; font-weight: bold; color: #767d85;font-family: 'Times New Roman', Times, serif; padding:0px; margin:0px;">
                    Business Projection Details</h3>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Expected Revenue: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->expectedRevenue ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Machines and Equipments: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->machineEquipment ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Working Capital: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->workingCapital ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Investment Plan : </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->investmentPlan ?? ''}}</p>
                </div>

                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Financing Sources: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->financingSource ?? ''}}</p>
                </div>
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Challenges Faced: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->challenges ?? ''}}</p>
                </div>
                
                <div class="margin-top:.3rem;">
                    <p style="padding:0px;font-weight: bold; margin:0px;font-size: 1.2rem; color: #344c68;font-family: 'Times New Roman', Times, serif">
                        <b>Support Needed: </b></p>
                    <p style="margin:0px; padding:0px;">
                        {{ $projectionDetails->supportNeeded ?? ''}}</p>
                </div>
            </div>
        @endif
  </div>
</body>