<!--
<giphy-panel></giphy-panel>
-->
<multi-step-form class="step-form">
    <template slot-scope="{ activeStep }" slot="navigation">
        <ul>
            <li :class="{ 'is-active': (activeStep == 0) }">
                <i class="fas fa-microphone-alt"></i>
                Express yourself
            </li>
            <li :class="[{ 'is-active': (activeStep == 1) }, 'f-2']">

                <i class="far fa-lightbulb"></i>
                Giphonize yourself
            </li>
            <li :class="{ 'is-active': (activeStep == 2) }">

                <i class="fas fa-sticky-note"></i>
                Make a post
            </li>
        </ul>
    </template>
    <form-step class="form-input">
        <textarea placeholder="Step 1: write anything!"></textarea>
    </form-step>
    <form-step>
        <p>Step 2: choose a gif!</p>
    </form-step>
    <form-step>
        <p>Step 3: in progress</p>
    </form-step>
</multi-step-form>