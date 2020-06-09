<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\LocationModel;
use App\Models\AdvertisementModel;
use App\Models\MediaModel;
use App\Models\CustomerModel;

class Search extends BaseController
{
    /**
     * Search Index Function
     * Display all advertisements if none of the parameter values have been specified.
     * Param1 : District or Country
     * Param2 : Category or City.
     * Param3 : Category or Subcategory
     * Param4 : Subcategory
     * Example URLs
     * 1. /index/Sri-Lanka
     * 2. /index/Colombo
     * 3. /index/Colombo/Dehiwela
     * 4. /index/Colombo/Electronics
     * 5. /index/Colombo/Electronics/Mobile-Phones
     * 6. /index/Colombo/Dehiwela/Electronics
     * 7. /index/Colombo/Dehiwela/Electronics/Mobile-Phones
     * 6. /index/Sri-Lanka/Electronics
     * 7. /index/Sri-Lanka/Electronics/Mobile-Phones
     * 
     * Additional Parameters are as follows
     * /index/Sri-Lanka?sort=0&query=audi
     */
	public function index($param1=null, $param2=null, $param3=null, $param4=null)
	{
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'Search';
		$seo['admin'] = false;
        
        // Start Session
		session()->start();

        // Initialize Models
        $modelCategory = new CategoryModel();
        $modelSubcategory = new SubcategoryModel();
        $modelLocation = new LocationModel();
        $modelAdvertisement = new AdvertisementModel();
        $modelMedia = new MediaModel();
        $modelCustomer = new CustomerModel();

        // Retrieve All Categories
        $data['category'] = $modelCategory->orderBy('category_name','ASC')->findAll();

        // Retireve All Locations
        $location = $modelLocation->orderBy('district','ASC')->findAll();
        $districts=array();
        $cities=array();
        $data['location'] = $modelLocation->findAll();
        foreach ($data['location'] as $loc) {
            if (!in_array($loc['district'], $districts)) {
                $districts[] = $loc['district'];
            }
        }
        foreach ($data['location'] as $loc) {
            if (!in_array($loc['city'], $loc)) {
                $cities[] = $loc['city'];
            }
        }
        $data['district'] = $districts;
        $data['city'] = $cities;
        $data['media'] = $modelMedia->orderBy('id','DESC')->findAll();

        $term=$this->request->getVar('term');
        if ($term == null) {
            $term = "";
        } else {
            $data['term'] = $term;
        }

        
        // If first parameter is null then all ads
        if ($param1 == null) {
            // Retrieve all the advertisements and display all ads
            $data['advertisement'] = $modelAdvertisement->like('title',$term)->orderBy('id','DESC')->findAll();
            if ($this->request->getVar('term') == null) {
                $data['term']=null;
            } else {
                $data['term']=$this->request->getVar('term');
            }

            // No Category or District Selected

            echo view('Templates/Header', $seo);
            echo view('Templates/Navbar', $data);
            return view('search', $data);

        } elseif ($param1 != null && $param2 == null) {
            // Parameter 1 is not null
            // If parameter 1 is sri-lanka then retrieve all ads under sri lanka - ALL ADS
            $param1 = str_replace('-',' ',$param1);;
            $country = $modelLocation->where('country',$param1)->first();
            if ($country != null) {
                // Parameter 1 is a country. So again return all ads while also checking using search term.
                $data['advertisement'] = $modelAdvertisement->like('title',$term)->orderBy('id','DESC')->findAll();
                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }

                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
                
            } else {
                // Check if Parameter 1 is a District
                $locations = $modelLocation->where('district', $param1)->orderBy('id','DESC')->findAll();

                if ($locations != null) {
                    // Selected District - Store in Parameter
                    $data['selectedDistrict']=$param1;

                    // Populate Array with cities under selected District
                    $data['city'] = $locations;

                    // Retrieve Advertsements based on Search Term and Location
                    $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                    $filteredAds=array();

                    foreach ($locations as $loc) {
                        foreach ($advertisements as $ad) {
                            if ($loc['id'] == $ad['location']) {
                                $filteredAds[]=$ad;
                            }
                        }
                    }

                    $data['adresults'] = $filteredAds;
                } else {
                    // Retrieve advertisements based on Search Term Only.
                    $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                }

                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }


                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
            }
        } elseif ($param1 != null && $param2 != null && $param3 == null) {
            
            // Parameter 1 Can be either country or district
            $param1 = str_replace('-',' ',$param1);
            $country = $modelLocation->where('country',$param1)->first();
            if ($country != null) {
                // Parameter 1 is a Country
                // Parameter 2 can be Category Only
                $category=$modelCategory->where('category_slug',$param2)->first();
                if ($category != null) {
                    $data['selectedCategory'] = $category;
                    $data['subcategory'] = $modelSubcategory->where('category_id',$category['id'])->orderBy('sub_category_name','ASC')->findAll();
                    $data['adresults'] = $modelAdvertisement->where('cat_id',$category['id'])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                } else {
                    $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                }

                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }

                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
                
            } else {
                // Check if Parameter 1 is a District
                $locations = $modelLocation->where('district', $param1)->orderBy('id','DESC')->findAll();

                if ($locations != null) {
                    // Parameter 1 is a District
                    $data['selectedDistrict'] = $param1;
                    // Populate Array with cities under selected District
                    $data['city'] = $locations;
                    // Parameter 2 can be a City or Category
                    // City and Category won't have same names.
                    $city = $modelLocation->where(['district' => $param1, 'city' => $param2])->first();
                    if ($city != null) {
                        // Parameter 2 is a city
                        $data['selectedCity'] = $param2;
                        // Get Advertisements based on input city
                        $data['adresults'] = $modelAdvertisement->where('location',$city['id'])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                    } else {
                        // If City is Null check if Category
                        $category = $modelCategory->where('category_slug',$param2)->first();
                        if ($category !=null) {
                            // Parameter 2 is a category and Parameter 1 is a District
                            $data['selectedCategory'] = $category;
                            // Get Advertisements based on input category and district
                            $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                            $filteredAds=array();

                            foreach ($locations as $loc) {
                                foreach ($advertisements as $ad) {
                                    if ($ad['location'] == $loc['id'] && $ad['cat_id'] == $category['id']) {
                                        $filteredAds[]=$ad;
                                    }
                                }
                            }

                            // Populate array with Subcategories for chosen category
                            $data['subcategory'] = $modelSubcategory->where('category_id',$category['id'])->orderBy('sub_category_name','ASC')->findAll();

                            $data['adresults'] = $filteredAds;
                        } else {
                            // Parameter 2 is not a category. Invalid value. Return all ads.
                            $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        }
                    }
                } else {
                    $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                }
                
                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }


                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
            }

        } elseif ($param1 != null && $param2 != null && $param3 != null && $param4 == null) {
            // Parameter 1 can be either Country or District
            $param1 = str_replace('-',' ',$param1);
            $country = $modelLocation->where('country',$param1)->first();
            if ($country != null) {
                // Parameter 1 is country - Sri Lanka
                // Parameter 2 can therefore be category only.
                // Parameter 3 can only be subcategory then.
                $category=$modelCategory->where('category_slug',$param2)->first();
                if ($category != null) {
                    // Parameter 2 is a category
                    $subcategory = $modelSubcategory->where('sub_category_slug',$param3)->first();
                    $data['selectedCategory'] = $category;
                    if ($subcategory != null) {
                        // Parameter 1 is a Country - Sri Lanka.
                        // Parameter 2 is a Category
                        // Parameter 3 is a subcategory. Therefore, retrieve all advertisements.
                        $data['adresults'] = $modelAdvertisement->where('subcat_id',$subcategory['id'])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        $data['selectedSubcategory'] = $subcategory;
                        $data['subcategory'] = $modelSubcategory->where('category_id',$category['id'])->orderBy('sub_category_name','ASC')->findAll();
                    } else {
                        // Invalid Parameter 3, therefore return advertisements based on the category - Last known valid parameter
                        $data['adresults'] = $modelAdvertisement->where('cat_id',$category['id'])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        $data['subcategory'] = $modelSubcategory->where('category_id',$category['id'])->orderBy('sub_category_name','ASC')->findAll();
                   }
                } else {
                    // Invalid Parameter therefore do not have to check Parameter 3. Return all ads based on last known valid parameter - Country. All are of same country so return all advertisements.
                    $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                }

                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }

                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
            } else {
                // Parameter 1 is District
                // Parameter 2 can be either category or city.
                // Parameter 3 can be either subcategory or category
                // Check if Parameter 1 is a valid District
                $locations = $modelLocation->where('district', $param1)->orderBy('id','DESC')->findAll();
                $data['selectedDistrict']=$param1;
                if ($locations != null) {
                    // Parameter 1 is District
                    // Check if Parameter 2 is a city or category
                    $city = $modelLocation->where('city', $param2)->first();
                    if ($city != null) {
                        // Parameter 2 is a city
                        // Check if Parameter 3 is a category
                        $category = $modelCategory->where('category_slug',$param3)->first();
                        $data['selectedCity']=$param2;
                        if ($category != null) {
                            // Parameter 1 is a district
                            // Parameter 2 is a city
                            // Parameter 3 is a category
                            // Retrieve all ads based on the category and city
                            $data['adresults'] = $modelAdvertisement->where(['cat_id' => $category['id'], 'location' => $city['id']])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                            $data['selectedCategory']=$category;
                            $data['subcategory'] = $modelSubcategory->where('category_id', $category['id'])->orderBy('sub_category_name','ASC')->findAll();
                        } else {
                            // Parameter 1 is a district
                            // Parameter 2 is a city
                            // Parameter 3 is not a category - Return ads based on city
                            $data['adresults'] = $modelAdvertisement->where('location',$city['id'])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        }
                    } else {
                        // Parameter 2 is a category
                        $category = $modelCategory->where('category_slug',$param2)->first();
                        if ($category != null) {
                            // Parameter 2 is a valid Category
                            // Parameter 3 is a subcategory
                            $subcategory = $modelSubcategory->where('sub_category_slug',$param3)->first();
                            $data['selectedCategory']=$category;
                            if ($subcategory != null) {
                                // Parameter 1 is a District
                                // Parameter 2 is a category
                                // Parameter 3 is a valid Subcategory
                                $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                                $data['selectedSubcategory']=$subcategory;
                                $filteredAds=array();

                                foreach($locations as $loc) {
                                    foreach ($advertisements as $ad) {
                                        if (($loc['id'] == $ad['location']) && ($subcategory['id'] == $ad['subcat_id'])) {
                                            $filteredAds[]=$ad;
                                        }
                                    }
                                }
                                $data['adresults'] = $filteredAds;
                            } else {
                                // Parameter 1 is a District
                                // Parameter 2 is a category
                                // Parameter 3 is a invalid subategory 
                                $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                                $filteredAds=array();

                                foreach ($locations as $loc) {
                                    foreach ($advertisements as $ad) {
                                        if (($loc['id'] == $ad['location']) && ($category['id'] == $ad['cat_id'])) {
                                            $filteredAds[]=$ad;
                                        }
                                    }
                                }
                                $data['adresults'] = $filteredAds;
                            }
                        } else {
                            // Parameter 1 is a District
                            // Parameter 2 is not a city or a category - Return ads based on district
                            $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                            $filteredAds=array();

                            foreach ($locations as $loc) {
                                foreach ($advertisements as $ad) {
                                    if ($loc['id'] == $ad['location']) {
                                        $filteredAds[]=$ad;
                                    }
                                }
                            }

                            $data['adresults'] = $filteredAds;
                        }
                    }
                } else {
                    // Invalid District therefore do not have to check Parameter 3. Return all ads.
                    $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                }
                
                if ($this->request->getVar('term') == null) {
                    $data['term']=null;
                } else {
                    $data['term']=$this->request->getVar('term');
                }


                echo view('Templates/Header', $seo);
                echo view('Templates/Navbar', $data);
                return view('search', $data);
            }
        } else {
            // Parameter 1 is District
            // Parameter 2 is City
            // Parameter 3 is Category
            // Parameter 4 is subcategory
            $locations = $modelLocation->where('district', $param1)->orderBy('id','DESC')->findAll();
            if ($locations != null) {
                $city = $modelLocation->where('city', $param2)->first();
                if ($city != null) {
                    $category = $modelCategory->where('category_slug',$param3)->first();
                    if ($category != null) {
                        $subcategory = $modelSubcategory->where('sub_category_slug',$param4)->first();
                        if ($subcategory != null) {
                            // Parameter 1 is a District
                            // Parameter 2 is a City
                            // Parameter 3 is a Category
                            // Parameter 4 is a Subcategory
                            // Return Ads based on city and subcategory
                            $data['selectedDistrict'] = $param1;
                            $data['selectedCity'] = $param2;
                            $data['selectedCategory'] = $category;
                            $data['selectedSubcategory'] = $subcategory;
                            $data['adresults'] = $modelAdvertisement->where(['location' => $param2, 'subcat_id' => $subcategory['id']])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        } else {
                            // Parameter 1 is a District
                            // Parameter 2 is a City
                            // Parameter 3 is a Category
                            // Invalid Parameter 4
                            // Parameter 4 is not a subcategory - Return ads based on category and city
                            $data['selectedDistrict'] = $param1;
                            $data['selectedCity'] = $param2;
                            $data['selectedCategory'] = $category;
                            $data['subcategory'] = $modelSubcategory->where('category_id', $category['id'])->orderBy('sub_category_name','ASC')->findAll();
                            $data['adresults'] = $modelAdvertisement->where(['location' => $param2, 'cat_id' => $category['id']])->like('title',$term)->orderBy('post_date','DESC')->findAll();
                        }
                    } else {
                        // Parameter 1 is  District
                        // Parameter 2 is a City
                        // Invalid Parameter 3
                        // Parameter 3 is not a category - Return ads based on city
                        $data['selectedDistrict'] = $param1;
                        $data['selectedCity'] = $param2;
                        $data['category'] = $modelCategory->orderBy('category_name','ASC')->findAll();
                        $data['adresults'] = $modelAdvertisement->where('location', $param2)->like('title',$term)->orderBy('post_date','DESC')->findAll();
                    }
                } else {
                    // Parameter 1 is a District
                    // Invalid Parameter 2
                    // Parameter 2 is not a city - Return ads based on district
                    $advertisements = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();
                    $filteredAds=array();

                    foreach ($locations as $loc) {
                        foreach ($advertisements as $ad) {
                            if ($loc['id'] == $ad['location']) {
                                $filteredAds[]=$ad;
                            }
                        }
                    }
                    $data['selectedDistrict'] = $param1;
                    $data['city'] = $modelLocation->where('district',$param1)->orderBy('city','ASC')->findAll();
                    $data['category'] = $modelCategory->orderBy('category_name','ASC')->findAll();
                    $data['subcategory'] = $modelSubcategory->orderBy('sub_category_name','ASC')->findAll();
                    $data['adresults'] = $filteredAds;
                }
            } else {    
                // Invalid Parameter 1
                // Return All Advertisements
                $data['adresults'] = $modelAdvertisement->like('title',$term)->orderBy('post_date','DESC')->findAll();                
            }

            if ($this->request->getVar('term') == null) {
                $data['term']=null;
            } else {
                $data['term']=$this->request->getVar('term');
            }


            echo view('Templates/Header', $seo);
            echo view('Templates/Navbar', $data);
            return view('search', $data);

        }
    }
    

}
