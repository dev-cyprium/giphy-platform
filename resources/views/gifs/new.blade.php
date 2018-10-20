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

    <template slot-scope="{mutator, d}">
        <form-step class="form-input">
            <textarea :value="d" @input="ev => mutator(ev.target.value)" placeholder="Step 1: write anything! "></textarea>
        </form-step>
        <form-step>
            <giphy-panel @change="data => mutator(data)"></giphy-panel>
        </form-step>
        <form-step >
            <p>Step 3: in progress</p>
        </form-step>
    </template>
</multi-step-form>