<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Number;

class Table
{

    protected $header = ['ID' => 'id', 'kategori' => 'Nama Kategori', 'description' => 'Description'];
    protected $data;
    /**
     * Create a new class instance.
     */
    public function __construct($data, array $header)
    {
        $this->header = $header;
        $this->data = $data;
    }


    public function show($table_name)
    {
        $table = $this->open();
        $table .= $this->setHeader();
        $table .= $this->setBody($table_name);
        $table .= $this->close();

        return $table;
    }

    protected function open()
    {
        return '<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">';
    }

    protected function close()
    {
        return '</table>';
    }

    protected function setHeader()
    {

        $html = '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white"><tr>';
        $html .= '<th scope="col" class="px-3 py-1">
                    <input type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                </th>';
        foreach ($this->header as $key => $value) {
            $html .= '<th scope="col" class="px-4 py-3">' . $value . '</th>';
        }
        $html .= '<th scope="col" class="px-4 py-3">
                    <span class="sr-only">Actions</span>
                  </th>';
        $html .= '</tr></thead>';
        return $html;
    }

    protected function setBody($table_name)
    {
        $body = '<tbody>';
        foreach ($this->data as $key => $data) {
            $id = Arr::has($data->toArray(), 'id') ? $data->toArray()['id'] : '';
            $body .= ' <tr class="border-b dark:border-gray-700">';
            $body .= '<th class="px-3 py-1">
                        <input type="checkbox" name="id" value="' . $id . '"
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    </th>';

            $link = Arr::has($data->toArray(), 'link') ? $data->toArray()['link'] : '';
            $kode_tender = Arr::has($data->toArray(), 'tender_id') ? $data->toArray()['tender_id'] : '';
            $link_tender = Arr::has($data->toArray(), 'datalpse') ? $data->toArray()['datalpse']['link'] : '';
            $versi_tender = Arr::has($data->toArray(), 'versi_spse_paket') ? '<span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">' . $data->toArray()['versi_spse_paket'] . '</span>' : '';
            $metode_pemilihan = Arr::has($data->toArray(), 'metode_pemilihan') ? '<span
                                               class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">' . $data->toArray()['metode_pemilihan'] . '</span>' : '';
            $status_tender = '';
            if (Arr::has($data->toArray(), 'status_tender')) {
                if ($data->toArray()['status_tender'] == 'Aktif') {
                    $status_tender = '<span class="bg-grren-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-white dark:text-green-300">' . $data->toArray()['status_tender'] . '</span>';
                } else {
                    $status_tender = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-white dark:text-red-300">' . $data->toArray()['status_tender'] . '</span>';
                }
            }

            foreach ($data->toArray() as  $k => $arr) {

                if (Arr::has($this->header, $k)) {
                    if ($k == 'id') {
                        $body .= '<th scope="row"
                                        class="px-4 py-3 font-medium text-gray-700 whitespace-nowrap dark:text-white">
                                        ' . $arr . '</th>';
                    } elseif (in_array($k, ['jumlah_paket', 'jumlah_pagu'])) {
                        $body .= '<td class="px-4 py-3 dark:text-white">' . Number::format($arr, 0, 0, 'id-ID') . '</td>';
                    } elseif (in_array($k, ['hps', 'pagu'])) {
                        $body .= '<td class="px-4 py-3 dark:text-white">Rp.' . Number::format($arr, 0, 0, 'id-ID') . '</td>';
                    } elseif (in_array($k, ['tanggal_akhir_penawaran', 'waktu_pemilihan'])) {
                        $body .= '<td class="px-4 py-3 dark:text-white">' . Carbon::parse($arr)->format('d-M-Y') . '</td>';
                    } elseif (in_array($k, ['nama_lpse'])) {
                        $body .= '<td class="px-4 py-3 dark:text-white hover:text-blue-800"><a href="' . $link . '" target="_blank">' . $arr . '</a></td>';
                    } elseif (in_array($k, ['nama_paket'])) {
                        if ($table_name == 'tender') {
                            $body .= '<td class="px-4 py-3 dark:text-white hover:text-blue-800"><a href="' . $link_tender . '/lelang/' . $kode_tender . '/pengumumanlelang' . '" target="_blank">' . $arr . '<br> ' .  $versi_tender . ' ' . $metode_pemilihan . ' ' . $status_tender . '</a></td>';
                        }
                    } else {
                        $body .= '<td class="px-4 py-3 dark:text-white">' . $arr .  '</td>';
                    }
                }
            }
            $body .= '<td class="px-4 py-3 flex items-center justify-end">
                        <button id="action-' . $id . '-dropdown-button"
                        data-dropdown-toggle="action-' . $id . '-dropdown"
                        class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        <div id="action-' . $id . '-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm" aria-labelledby="action-' . $id . '-dropdown-button">
                                <li>
                                    <button type="button"
                                        data-modal-target="updateProductModal' . $id . '"
                                        data-modal-toggle="updateProductModal' . $id . '"
                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                        </svg>
                                        ' . __('global.edit') . '
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        data-modal-target="readProductModal' . $id . '"
                                        data-modal-toggle="readProductModal' . $id . '"
                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        ' . __('global.preview') . '
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        data-modal-target="deleteModal' . $id . '"
                                        data-modal-toggle="deleteModal' . $id . '"
                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                        <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                fill="currentColor"
                                                d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                        </svg>
                                        ' . __('global.delete') . '
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>';
            // Modal
            $body .= '<div id="deleteModal' . $id . '" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <form action="/admin/' . $table_name . '/' . $id . '" method="post">
                                <input type="hidden" name="_token" value="' . csrf_token() . '" >
                                <input type="hidden" name="_method" value="delete" >
                                <div
                                    class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button"
                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="deleteModal' . $id . '">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                        aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">
                                        ' . __('global.confirm.delete') . '
                                    </p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteModal' . $id . '"
                                            type="button"
                                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">' . __('global.cancel') . '</button>
                                        <button type="submit"
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">' . __('global.delete') . '</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>';
            $body .= '</tr>';
        }
        $body .= '</tbody>';

        return $body;
    }
}
