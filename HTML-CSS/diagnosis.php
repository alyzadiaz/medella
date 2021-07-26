<!DOCTYPE html>
<html>
    <head>
        <title>Diagnosis</title>
        <link rel="stylesheet" type="text/css" href="new-home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../RESOURCES/lavender.svg">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=News+Cycle&display=swap');
        </style>

        <script src="../JAVASCRIPT-PHP/diagnosis.js"></script>
    </head>
    <body>
        <div id="top-bar">
            <img src="../RESOURCES/m-logo.png" height="150px">
            <button type="button" class="login-button right">
                <img src="../RESOURCES/settings.png" height="30px">
            </button>
        </div>
        <div id="diagnosis-title" class="inside">
            <div class="flex-row">
                <h1>Parkinson's Disease</h1>
                <img src="../RESOURCES/empty-bookmark.svg" id="bookmark" height="30px">
                <!--<button><i class="fa fa-plus"></i></button>-->
            </div>
            <p>Diagnosis #ID: 143</p>
            <!--<div class="flex-row">
                <select name="lang" id="lang">
                    <option>English</option>
                    <option>Spanish</option>
                    <option>French</option>
                    <option>Chinese (Mandarin)</option>
                    <option>Portuguese (Brazilian)</option>
                    <option>Swahili</option>
                    <option>Russian</option>
                </select>
                <button><i class="fa fa-volume-up fa-2x"></i></button>
            </div>-->
            <div id="google_translate_element"></div>
            
            <script type ="text/javascript">
                function googleTranslateElementInit(){
                    new google.translate.TranslateElement(
                        {pageLanguage: 'en'},
                        'google_translate_element'
                    );
                }            
            </script>

            <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
        
        </div>
        <div class="flex-row diagnosis-body">
            <div  id="diagnosis-summary" class="block left">
                <div class="flex-row">
                    <h2>Summary</h2>
                    <span class="helper"></span><img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <p>Parkinson's disease is a progressive nervous system disorder that affects movement. Symptoms start gradually, 
                sometimes starting with a barely noticeable tremor in just one hand. Tremors are common, but the disorder also commonly 
                causes stiffness or slowing of movement. In the early stages of Parkinson's disease, your face may show little or no 
                expression. Your arms may not swing when you walk. Your speech may become soft or slurred. Parkinson's disease symptoms
                worsen as your condition progresses over time. Although Parkinson's disease can't be cured, medications might significantly
                improve your symptoms. Occasionally, your doctor may suggest surgery to regulate certain regions of your brain and improve 
                your symptoms.
                </p>
            </div>
            <div id="diagnosis-treatment" class="block right">
                <div class="flex-row">
                    <h2>Symptoms</h2>
                    <img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <p>Parkinson's disease signs and symptoms can be different for everyone. Early signs may be mild and go unnoticed. 
                Symptoms often begin on one side of your body and usually remain worse on that side, even after symptoms begin to affect 
                both sides. Parkinson's signs and symptoms may include (Tremor. A tremor, or shaking, usually begins in a limb, often your
                 hand or fingers. You may rub your thumb and forefinger back and forth, known as a pill-rolling tremor. Your hand may 
                 tremble when it's at rest. Slowed movement (bradykinesia). Over time, Parkinson's disease may slow your movement, making 
                 simple tasks difficult and time-consuming. Your steps may become shorter when you walk. It may be difficult to get out of 
                 a chair. You may drag your feet as you try to walk. Rigid muscles. Muscle stiffness may occur in any part of your body. 
                 The stiff muscles can be painful and limit your range of motion. Impaired posture and balance. Your posture may become 
                 stooped, or you may have balance problems as a result of Parkinson's disease. Loss of automatic movements. You may have 
                 a decreased ability to perform unconscious movements, including blinking, smiling or swinging your arms when you walk. 
                 Speech changes. You may speak softly, quickly, slur or hesitate before talking. Your speech may be more of a monotone 
                 rather than have the usual inflections. Writing changes. It may become hard to write, and your writing may appear small.). 
                </p>               
            </div>
            <div id="diagnosis-treatment" class="block right">
                <div class="flex-row">
                    <h2>Treatment</h2>
                    <img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <p>Parkinson's disease can't be cured, but medications can help control your symptoms, often dramatically. In some more 
                advanced cases, surgery may be advised. Your doctor may also recommend lifestyle changes, especially ongoing aerobic 
                exercise. In some cases, physical therapy that focuses on balance and stretching also is important. A speech-language 
                pathologist may help improve your speech problems.
                </p>
            </div>
        </div>
    </body>
</html>