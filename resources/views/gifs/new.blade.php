<multi-step-form class="step-form">
    <template slot-scope="{ activeStep }" slot="navigation">
        <ul>
            <li :class="{ 'is-active': (activeStep == 0) }">
                <i class="fas fa-microphone-alt"></i>
                {{ __("forms.giphy.express") }}
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
        <div slot-scope="{d, mutator}">
            <textarea :value="d" @input="ev => mutator(ev.target.value)" placeholder="Step 1: write anything! "></textarea>
        </div>
    </form-step>
    <form-step>
        <giphy-panel></giphy-panel>
    </form-step>
    <form-step>
        <p>Step 3: in progress</p>
    </form-step>
</multi-step-form>