@extends('layout')
@section('content')
    <div x-data="{ userType: '' }" class="font-[sans-serif]">
        <div class="bg-gradient-to-r from-blue-700 to-blue-300 w-full h-28"></div>
        <div class="-mt-14 mb-6 px-4">
            <div class="mx-auto max-w-6xl shadow-lg py-8 px-6 relative bg-white rounded">
                <h2 class="text-xl text-[#333] font-bold">Product or Service Inquiry</h2>
                <form class="mt-8 max-w-3xl mx-auto" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="w-full">
                        <select x-model="userType" class="w-full">
                            <option value="">Vous êtes ?</option>
                            <option value="particulier">Un particulier</option>
                            <option value="entreprise">Une entreprise</option>
                        </select>
                    </div>
                    <div x-show="userType === 'particulier'" class="flex">
                        <div class="w-full">
                            <label for="lastname">Nom</label>
                            <input type='text' id="lastname" placeholder='Nom' name="lastname"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                        </div>

                        <div class="w-full">
                            <label for="firstname">Prénom</label>
                            <input type='text' id="firstname" placeholder='Prénom' name="firstname"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                        </div>

                    </div>

                    <div x-show="userType === 'entreprise'">
                        <label for="enterprise">Entreprise</label>
                        <input type='text' id="enterprise" placeholder='Entreprise' name="enterprise"
                            class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />

                        <div class="flex">
                            <div class="w-full">
                                <label for="lastname" class="flex justify-between">Nom
                                    <span>Optionnel</span>
                                </label>
                                <input type='text' id="lastname" placeholder='Nom' name="lastname"
                                    class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                            </div>

                            <div class="w-full">
                                <label for="firstname" class="flex justify-between">Prénom
                                    <span>Optionnel</span>
                                </label>
                                <input type='text' id="firstname" placeholder='Prénom' name="firstname"
                                    class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                            </div>


                        </div>

                    </div>

                    <div class="flex">
                        <div class="w-full">
                            <label for="phone" class="flex justify-between">Numéro de téléphone
                                <span>Optionnel</span>
                            </label>
                            <input type='phone' id="phone" placeholder='Numéro de téléphone' name="phone"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                        </div>

                        <div class="w-full">
                            <label for="id_product" class="flex justify-between">ID produit
                                <span>Optionnel</span>
                            </label>
                            <input type='text' id="id_product" placeholder='ID produit' name="id_product"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                        </div>
                    </div>

                    <label for="email">Email
                        <input type='email' id="email" placeholder='Email' name="email"
                            class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />
                    </label>

                    <label for="subject">Sujet</label>
                    <input type='text' id="subject" placeholder='Subject' name="subject"
                        class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#007bff]" />

                    <label for="message">Message</label>
                    <textarea placeholder='Message' id="message" rows="6" name="message"
                        class="col-span-full w-full rounded px-4 border-2 text-sm pt-3 outline-[#007bff]"></textarea>

                    <div class="flex items-center col-span-full">
                        <input id="checkbox1" type="checkbox" class="w-4 h-4 mr-3" />
                        <label for="checkbox1" class="text-sm text-gray-400">I agree to the <a href="javascript:void(0);"
                                class="underline">Terms and Conditions</a> and <a href="javascript:void(0);"
                                class="underline">Privacy Policy</a></label>
                    </div>

                    <button type='submit'
                        class="text-black w-max bg-lime-700 hover:bg-blue-600 font-semibold rounded text-sm px-6 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff'
                            class="mr-2 inline" viewBox="0 0 548.244 548.244">
                            <path fill-rule="evenodd"
                                d="M392.19 156.054 211.268 281.667 22.032 218.58C8.823 214.168-.076 201.775 0 187.852c.077-13.923 9.078-26.24 22.338-30.498L506.15 1.549c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666L390.89 525.906c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z"
                                clip-rule="evenodd" data-original="#000000" />
                        </svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
