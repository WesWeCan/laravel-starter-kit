<script setup lang="ts">
import { Form, Link, usePage } from '@inertiajs/vue3';
import type { PageProps } from '@/types';

defineProps<{
    profileDefaults: {
        display_name: string;
        bio: string;
    };
}>();

const page = usePage<PageProps<{ flash: { success: string | null } }>>();
</script>

<template>
    <main class="all-elements">

        <div v-if="page.props.flash.success" role="alert">
            {{ page.props.flash.success }}
        </div>

        <!-- ─── 1. TYPOGRAPHY ─────────────────────────────────── -->
        <section>
            <h2>Typography</h2>

            <h1>Heading 1 — The biggest, baddest title</h1>
            <h2>Heading 2 — Section-level heading</h2>
            <h3>Heading 3 — Sub-section heading</h3>
            <h4>Heading 4 — Should not go this deep</h4>
            <h5>Heading 5 — Really? You serious?</h5>
            <h6>Heading 6 — You are in way too deep.</h6>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nisi voluptas error hic debitis
                assumenda
                placeat expedita id aliquam sequi architecto quidem, in ut et reprehenderit consequatur vero tenetur
                nobis!
            </p>

            <p>
                <b>Bold</b>,
                <strong>strong</strong>,
                <em>emphasis</em>,
                <i>italic</i>,
                <small>small text</small>,
                <mark>highlighted</mark>,
                <del>deleted</del>,
                <ins>inserted</ins>,
                <sub>sub</sub>script,
                <sup>super</sup>script,
                <abbr title="HyperText Markup Language">HTML</abbr>,
                <kbd>Ctrl</kbd> + <kbd>C</kbd>,
                <code>inline code</code>,
                <samp>sample output</samp>.
            </p>

            <blockquote cite="https://example.com">
                <p>The best code is the code you don't have to write.</p>
                <footer>— <cite>Someone wise, probably</cite></footer>
            </blockquote>

            <pre><code>function greet(name: string): string {
    return `Hello, ${name}!`;
}
console.log(greet('Dominus'));</code></pre>

            <hr>

            <ul>
                <li>Unordered item one</li>
                <li>Unordered item two
                    <ul>
                        <li>Nested item A</li>
                        <li>Nested item B</li>
                    </ul>
                </li>
                <li>Unordered item three</li>
            </ul>

            <ol>
                <li>First ordered item</li>
                <li>Second ordered item
                    <ol>
                        <li>Sub-step one</li>
                        <li>Sub-step two</li>
                    </ol>
                </li>
                <li>Third ordered item</li>
            </ol>

            <dl>
                <dt>Laravel</dt>
                <dd>A PHP web application framework with expressive, elegant syntax.</dd>
                <dt>Inertia.js</dt>
                <dd>Glues a server-side framework to a client-side framework without building an API.</dd>
                <dt>Vue</dt>
                <dd>A progressive JavaScript framework for building user interfaces.</dd>
            </dl>

            <address>
                Written by <a href="mailto:dominus@example.com">Wesley</a>.<br>
                1234 Starter Lane, Framework City.
            </address>
        </section>

        <!-- ─── 2. LINKS & BUTTONS ───────────────────────────── -->
        <section>
            <h2>Links and Buttons</h2>

            <p>
                <a href="https://laravel.com" target="_blank" rel="noopener noreferrer">External link (laravel.com)</a>
            </p>
            <p>
                <Link href="/">Inertia SPA link back to home</Link>
            </p>

            <section>
                <button type="button">Button</button>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
                <button type="button" disabled>Disabled button</button>
            </section>


            <div class="buttons">
                <button type="button">Button</button>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
                <button type="button" disabled>Disabled button</button>
            </div>


        </section>

        <!-- ─── 3. NATIVE FORM CONTROLS ──────────────────────── -->
        <section>
            <h2>Native Form Controls</h2>
            <p>Static reference — no submit handler. Every input type you'll actually use.</p>

            <form>
                <fieldset>
                    <legend>Text Inputs</legend>

                    <div class="form-group">
                        <label for="ctrl-text">Text</label>
                        <input id="ctrl-text" type="text" placeholder="Plain text input" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-email">Email</label>
                        <input id="ctrl-email" type="email" placeholder="you@example.com" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-password">Password</label>
                        <input id="ctrl-password" type="password" placeholder="••••••••" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-number">Number</label>
                        <input id="ctrl-number" type="number" placeholder="42" min="0" max="100" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-tel">Telephone</label>
                        <input id="ctrl-tel" type="tel" placeholder="+1 555 000 0000" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-url">URL</label>
                        <input id="ctrl-url" type="url" placeholder="https://example.com" />
                    </div>

                    <div class="form-group row">
                        <label for="ctrl-search">🔍</label>
                        <input id="ctrl-search" type="search" placeholder="Search…" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Date &amp; Time Inputs</legend>

                    <div class="form-group">
                        <label for="ctrl-date">Date</label>
                        <input id="ctrl-date" type="date" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-time">Time</label>
                        <input id="ctrl-time" type="time" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-datetime">Date &amp; Time</label>
                        <input id="ctrl-datetime" type="datetime-local" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-month">Month</label>
                        <input id="ctrl-month" type="month" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-week">Week</label>
                        <input id="ctrl-week" type="week" />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-color">Color</label>
                        <input id="ctrl-color" type="color" value="#6366f1" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Textarea &amp; Select</legend>


                    <div class="form-group">
                        <label for="ctrl-textarea">Textarea</label>
                        <textarea id="ctrl-textarea" rows="4" placeholder="Write something here…"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="ctrl-select">Select</label>
                        <select id="ctrl-select">
                            <option value="">Choose an option</option>
                            <option value="a">Option A</option>
                            <option value="b">Option B</option>
                            <option value="c">Option C</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ctrl-multi">Multi-select</label>
                        <select id="ctrl-multi" multiple size="4">
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ctrl-datalist">Datalist (autocomplete)</label>
                        <input id="ctrl-datalist" type="text" list="fruit-options" placeholder="Type a fruit…" />
                        <datalist id="fruit-options">
                            <option value="Apple" />
                            <option value="Banana" />
                            <option value="Cherry" />
                            <option value="Durian" />
                        </datalist>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Checkbox, Radio &amp; Range</legend>





                    <div class="form-group">

                        <label>Preferences</label>
                        <label><input type="checkbox" name="prefs" value="email" /> Email notifications</label>
                        <label><input type="checkbox" name="prefs" value="sms" checked /> SMS notifications</label>
                        <label><input type="checkbox" name="prefs" value="push" disabled /> Push (disabled)</label>

                    </div>

                    <div class="form-group">
                        <label>Plan</label>
                        <label><input type="radio" name="plan" value="free" /> Free</label>
                        <label><input type="radio" name="plan" value="pro" checked /> Pro</label>
                        <label><input type="radio" name="plan" value="enterprise" /> Enterprise</label>
                    </div>


                    <div class="form-group">
                    <label for="ctrl-range">Range</label>
                    <input id="ctrl-range" type="range" min="0" max="100" value="40" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend>State Variants</legend>

                    <div class="form-group">
                        <label for="ctrl-readonly">Readonly</label>
                        <input id="ctrl-readonly" type="text" value="Cannot edit me" readonly />
                    </div>
                    <div class="form-group">
                        <label for="ctrl-disabled">Disabled</label>
                        <input id="ctrl-disabled" type="text" value="Also locked" disabled />
                    </div>

                    <div class="form-group">
                        <label for="ctrl-required">Required</label>
                        <input id="ctrl-required" type="text" placeholder="This field is required" required />
                    </div>
                    <div class="form-group">
                        <label for="ctrl-file">File</label>
                        <input id="ctrl-file" type="file" />
                    </div>
                </fieldset>
            </form>
        </section>

        <!-- ─── 4a. INERTIA FORM — CONTACT ───────────────────── -->
        <section>
            <h2>Inertia Form A — Contact (basic POST)</h2>
            <p>Demonstrates <code>&lt;Form&gt;</code> with <code>reset-on-success</code>. Submit empty to see validation
                errors, or fill it in to see a success flash.</p>

            <Form :action="route('showcase.contact.store')" method="post" reset-on-success
                :options="{ preserveScroll: true }"
                #default="{ errors, processing, wasSuccessful }">
                <div v-if="wasSuccessful" role="status">Message sent!</div>

                <div class="form-group">
                    <label for="contact-name">Name</label>
                <input id="contact-name" type="text" name="name" />
                <span v-if="errors.name" role="alert">{{ errors.name }}</span>
                </div>

                <div class="form-group">
                <label for="contact-email">Email</label>
                <input id="contact-email" type="email" name="email" />
                <span v-if="errors.email" role="alert">{{ errors.email }}</span>
                </div>

                <div class="form-group">
                <label for="contact-message">Message</label>
                <textarea id="contact-message" name="message" rows="4"></textarea>
                <span v-if="errors.message" role="alert">{{ errors.message }}</span>
                </div>

                
                <button type="submit" :disabled="processing">
                    {{ processing ? 'Sending…' : 'Send message' }}
                </button>
            </Form>
        </section>

        <!-- ─── 4b. INERTIA FORM — REGISTRATION ──────────────── -->
        <section>
            <h2>Inertia Form B — Registration (validation errors)</h2>
            <p>Rules are strict. Submit empty to see every Laravel validation error surface through the
                <code>errors</code> slot prop.
            </p>

            <Form :action="route('showcase.registration.store')" method="post"
                :options="{ preserveScroll: true }"
                #default="{ errors, processing, wasSuccessful }">
                <div v-if="wasSuccessful" role="status">Registration complete!</div>

                <div class="form-group">
                <label for="reg-name">Name</label>
                <input id="reg-name" type="text" name="name" />
                <span v-if="errors.name" role="alert">{{ errors.name }}</span>
                </div>

                <div class="form-group">
                    <label for="reg-email">Email</label>
                <input id="reg-email" type="email" name="email" />
                <span v-if="errors.email" role="alert">{{ errors.email }}</span>
                </div>

                <div class="form-group">
                <label for="reg-password">Password</label>
                <input id="reg-password" type="password" name="password" />
                <span v-if="errors.password" role="alert">{{ errors.password }}</span>
                </div>

                

                <div class="form-group">
                <label for="reg-password-confirm">Confirm password</label>
                <input id="reg-password-confirm" type="password" name="password_confirmation" />
                <span v-if="errors.password_confirmation" role="alert">{{ errors.password_confirmation }}</span>
                </div>
                
                <button type="submit" :disabled="processing">
                    {{ processing ? 'Registering…' : 'Register' }}
                </button>
            </Form>
        </section>

        <!-- ─── 4c. INERTIA FORM — PROFILE UPDATE (PUT) ──────── -->
        <section>
            <h2>Inertia Form C — Profile Update (PUT + defaults)</h2>
            <p>Uses <code>method="put"</code> and populates inputs from page props via the <code>defaults</code> slot
                prop — the edit-form pattern without a database.</p>

            <Form :action="route('showcase.profile.update')" method="put" :defaults="profileDefaults"
                set-defaults-on-success :options="{ preserveScroll: true }"
                #default="{ errors, processing, wasSuccessful }">
                <div v-if="wasSuccessful" role="status">Profile saved!</div>

                <div class="form-group">
                <label for="profile-name">Display name</label>
                <input id="profile-name" type="text" name="display_name" :value="profileDefaults.display_name" />
                <span v-if="errors.display_name" role="alert">{{ errors.display_name }}</span>
                </div>

                <div class="form-group">
                <label for="profile-bio">Bio</label>
                <textarea id="profile-bio" name="bio" rows="3">{{ profileDefaults.bio }}</textarea>
                <span v-if="errors.bio" role="alert">{{ errors.bio }}</span>
                </div>

                <button type="submit" :disabled="processing">
                    {{ processing ? 'Saving…' : 'Save profile' }}
                </button>
            </Form>
        </section>

        <!-- ─── 4d. INERTIA FORM — FILE UPLOAD ───────────────── -->
        <section>
            <h2>Inertia Form D — File Upload (multipart)</h2>
            <p>Demonstrates <code>enctype="multipart/form-data"</code> on <code>&lt;Form&gt;</code> and the
                <code>progress</code> slot prop while uploading.
            </p>

            <Form :action="route('showcase.upload.store')" method="post" enctype="multipart/form-data" reset-on-success
                :options="{ preserveScroll: true }"
                #default="{ errors, processing, wasSuccessful, progress }">
                <div v-if="wasSuccessful" role="status">File uploaded!</div>

                <div class="form-group">
                <label for="upload-document">Document</label>
                <input id="upload-document" type="file" name="document" />
                <span v-if="errors.document" role="alert">{{ errors.document }}</span>
                </div>

                <progress v-if="progress" :value="progress.percentage" max="100">
                    {{ progress.percentage }}%
                </progress>

                <button type="submit" :disabled="processing">
                    {{ processing ? 'Uploading…' : 'Upload file' }}
                </button>
            </Form>
        </section>

        <!-- ─── 5. TABLES & MISC ──────────────────────────────── -->
        <section>
            <h2>Tables</h2>

            <table>
                <caption>Sample user data</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Alice</td>
                        <td>alice@example.com</td>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bob</td>
                        <td>bob@example.com</td>
                        <td>Editor</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Charlie</td>
                        <td>charlie@example.com</td>
                        <td>Viewer</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Figures, Details &amp; Meters</h2>

            <figure>
                <img src="https://placehold.co/400x200" alt="A placeholder image" width="400" height="200" />
                <figcaption>Fig. 1 — A generic placeholder image for layout reference.</figcaption>
            </figure>

            <details>
                <summary>Click to expand</summary>
                <p>Hidden content revealed by <code>&lt;details&gt;</code> and <code>&lt;summary&gt;</code>. Useful for
                    FAQs and collapsible sections.</p>
            </details>

            <p>
                <label for="static-progress">Static progress bar (60%)</label><br>
                <progress id="static-progress" value="60" max="100">60%</progress>
            </p>

            <p>
                <label for="static-meter">Disk usage meter (7 GB of 10 GB)</label><br>
                <meter id="static-meter" value="7" min="0" max="10" low="3" high="8" optimum="5">7 out of 10</meter>
            </p>
        </section>

    </main>
</template>
