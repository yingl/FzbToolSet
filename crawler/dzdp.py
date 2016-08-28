# -*- coding: utf-8 -*-

import re
from selenium import webdriver
from urllib import quote

browser = webdriver.Chrome()
browser.set_page_load_timeout(3)
urls = ['http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r35']
urls = ['http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r39', # 成都／购物／服饰／武侯区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r35', # 成都／购物／服饰／锦江区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r37', # 成都／购物／服饰／青羊区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r36', # 成都／购物／服饰／金牛区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r38', # 成都／购物／服饰／成华区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r4956', # 成都／购物／服饰／龙泉驿区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r27619',  # 成都／购物／服饰／青白江区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c4425', # 成都／购物／服饰／温江区
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c4424', # 成都／购物／服饰／温都区
        ]
'''
urls = ['http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1604', # 成都／购物／服饰／都江堰
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1605', # 成都／购物／服饰／彭州市
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r27623',  # 成都／购物／服饰／崇州市
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120r27622',  # 成都／购物／服饰／邛崃市
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1608', # 成都／购物／服饰／金堂县
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1609', # 成都／购物／服饰／双流县
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1610', # 成都／购物／服饰／郫县
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1611', # 成都／购物／服饰／大邑县
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1612', # 成都／购物／服饰／蒲江县
        'http://www.dianping.com/search/keyword/8/20_%E6%9C%8D%E9%A5%B0/g120c1613', # 成都／购物／服饰／新津县
        ]
'''
shop_home_pages = []
for url in urls:
    try:
        browser.get(url)
    except:
        pass
    next_url = url
    while next_url:
        try:
            browser.get(next_url)
        except:
            pass
        shops = browser.find_element_by_css_selector('#shop-all-list > ul').find_elements_by_tag_name('li')
        for i in xrange(1, len(shops)):
            home_page = shops[i].find_elements_by_tag_name("a")[0].get_attribute('href')
            shop_home_pages.append(home_page)
        try:
            next_url = browser.find_element_by_css_selector('#top > div.section.Fix > div.content-wrap > div.shop-wrap > div.page > a.next').get_attribute('href')
        except:
            next_url = None
for home_page in shop_home_pages:
    try:
        browser.get(home_page)
    except:
        try:
            name = browser.find_element_by_css_selector('#body > div.body-content.clearfix > div.breadcrumb > span').text
            tel = browser.find_element_by_css_selector('#basic-info > p > span.item').text
            print name + ', ' + tel + ', ' + home_page
        except:
            pass