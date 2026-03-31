"""
Curated geographical database for Tang Dynasty locations mentioned in poems.
Coordinates are for modern equivalents of ancient Chinese place names.
"""

TANG_LOCATIONS: dict[str, dict] = {
    # Capital cities
    "长安": {"lat": 34.3416, "lng": 108.9398, "modern": "西安, 陕西", "ancient": "长安", "desc": "唐朝首都"},
    "洛阳": {"lat": 34.6197, "lng": 112.4539, "modern": "洛阳, 河南", "ancient": "洛阳", "desc": "唐朝东都"},
    "金陵": {"lat": 32.0603, "lng": 118.7969, "modern": "南京, 江苏", "ancient": "金陵/建业", "desc": "六朝古都"},
    "建业": {"lat": 32.0603, "lng": 118.7969, "modern": "南京, 江苏", "ancient": "建业", "desc": "三国东吴首都"},

    # Rivers & water
    "黄河": {"lat": 35.7048, "lng": 109.7573, "modern": "黄河", "ancient": "黄河/河", "desc": "中国第二长河"},
    "长江": {"lat": 30.5728, "lng": 114.2795, "modern": "长江", "ancient": "江/大江", "desc": "中国最长河流"},
    "汉江": {"lat": 30.5993, "lng": 114.3162, "modern": "汉江, 湖北", "ancient": "汉水", "desc": "长江最大支流"},
    "渭水": {"lat": 34.3600, "lng": 108.8900, "modern": "渭河, 陕西", "ancient": "渭水", "desc": "关中平原主河"},
    "泾水": {"lat": 34.5300, "lng": 108.4600, "modern": "泾河, 陕西", "ancient": "泾水", "desc": "渭河支流"},
    "淮水": {"lat": 33.5000, "lng": 116.0000, "modern": "淮河", "ancient": "淮水", "desc": "中国四大河之一"},
    "洞庭湖": {"lat": 29.2800, "lng": 112.9000, "modern": "洞庭湖, 湖南", "ancient": "洞庭", "desc": "中国第二大淡水湖"},
    "鄱阳湖": {"lat": 29.1000, "lng": 116.2000, "modern": "鄱阳湖, 江西", "ancient": "鄱阳", "desc": "中国最大淡水湖"},
    "彭蠡": {"lat": 29.1000, "lng": 116.2000, "modern": "鄱阳湖, 江西", "ancient": "彭蠡泽", "desc": "古称鄱阳湖"},
    "巴陵": {"lat": 29.3573, "lng": 113.1134, "modern": "岳阳, 湖南", "ancient": "巴陵", "desc": "洞庭湖畔古城"},
    "岳阳": {"lat": 29.3573, "lng": 113.1134, "modern": "岳阳, 湖南", "ancient": "岳阳/巴陵", "desc": "洞庭湖东岸"},

    # Mountains
    "华山": {"lat": 34.4833, "lng": 110.0878, "modern": "华山, 陕西", "ancient": "华山/太华", "desc": "五岳之西岳"},
    "泰山": {"lat": 36.2700, "lng": 117.1000, "modern": "泰山, 山东", "ancient": "泰山/岱宗", "desc": "五岳之首"},
    "庐山": {"lat": 29.5608, "lng": 115.9842, "modern": "庐山, 江西", "ancient": "庐山/匡庐", "desc": "天下第一名山"},
    "峨眉山": {"lat": 29.5200, "lng": 103.4800, "modern": "峨眉山, 四川", "ancient": "峨眉", "desc": "四川著名山岳"},
    "天门山": {"lat": 29.3200, "lng": 110.4900, "modern": "张家界, 湖南", "ancient": "天门山", "desc": "湖南著名山峰"},
    "终南山": {"lat": 34.0667, "lng": 108.9333, "modern": "终南山, 陕西", "ancient": "终南山/南山", "desc": "秦岭主峰之一"},
    "祁连山": {"lat": 38.5000, "lng": 99.0000, "modern": "祁连山", "ancient": "祁连山", "desc": "甘肃青海界山"},
    "天山": {"lat": 43.0000, "lng": 84.0000, "modern": "天山", "ancient": "天山", "desc": "新疆大山脉"},
    "阴山": {"lat": 41.3000, "lng": 111.0000, "modern": "阴山, 内蒙古", "ancient": "阴山", "desc": "北方重要山脉"},

    # Northwest frontier
    "玉门关": {"lat": 40.3667, "lng": 94.9667, "modern": "玉门, 甘肃", "ancient": "玉门关", "desc": "丝绸之路要塞"},
    "阳关": {"lat": 39.7333, "lng": 94.0333, "modern": "敦煌南, 甘肃", "ancient": "阳关", "desc": "古丝路关口"},
    "敦煌": {"lat": 40.1424, "lng": 94.6613, "modern": "敦煌, 甘肃", "ancient": "敦煌/沙州", "desc": "丝路重镇"},
    "凉州": {"lat": 37.9286, "lng": 102.6431, "modern": "武威, 甘肃", "ancient": "凉州", "desc": "河西走廊重镇"},
    "轮台": {"lat": 41.7700, "lng": 84.5600, "modern": "轮台, 新疆", "ancient": "轮台", "desc": "西域古城"},
    "楼兰": {"lat": 40.5200, "lng": 89.5500, "modern": "罗布泊, 新疆", "ancient": "楼兰", "desc": "消失的西域古国"},
    "居延": {"lat": 41.7500, "lng": 101.3000, "modern": "额济纳旗, 内蒙古", "ancient": "居延", "desc": "汉代边塞"},
    "碛西": {"lat": 41.0000, "lng": 89.0000, "modern": "新疆塔克拉玛干", "ancient": "碛西", "desc": "大漠以西"},
    "安西": {"lat": 40.5200, "lng": 95.7700, "modern": "瓜州, 甘肃", "ancient": "安西", "desc": "唐代边疆重镇"},
    "瀚海": {"lat": 43.0000, "lng": 107.0000, "modern": "戈壁沙漠", "ancient": "瀚海", "desc": "北方大沙漠"},

    # Northeast
    "蓟门": {"lat": 39.9042, "lng": 116.4074, "modern": "北京附近", "ancient": "蓟门", "desc": "今北京附近"},
    "幽州": {"lat": 39.9042, "lng": 116.4074, "modern": "北京", "ancient": "幽州/蓟", "desc": "今北京地区"},
    "燕山": {"lat": 40.4166, "lng": 116.7286, "modern": "燕山, 北京北", "ancient": "燕山", "desc": "华北北部山脉"},
    "雁门": {"lat": 39.3558, "lng": 112.9130, "modern": "代县, 山西", "ancient": "雁门关", "desc": "古代军事要隘"},

    # Sichuan / Southwest
    "蜀": {"lat": 30.5728, "lng": 104.0668, "modern": "成都, 四川", "ancient": "蜀/益州", "desc": "古代蜀国地区"},
    "成都": {"lat": 30.5728, "lng": 104.0668, "modern": "成都, 四川", "ancient": "成都/益州", "desc": "四川省会"},
    "巴蜀": {"lat": 30.5728, "lng": 104.0668, "modern": "四川盆地", "ancient": "巴蜀", "desc": "四川重庆地区"},
    "三峡": {"lat": 30.8000, "lng": 110.9500, "modern": "长江三峡, 湖北", "ancient": "三峡", "desc": "瞿塘峡、巫峡、西陵峡"},
    "白帝城": {"lat": 31.0350, "lng": 109.5780, "modern": "奉节县, 重庆", "ancient": "白帝城", "desc": "三峡入口名城"},
    "夔州": {"lat": 31.0180, "lng": 109.5000, "modern": "奉节, 重庆", "ancient": "夔州", "desc": "今重庆奉节"},
    "巫山": {"lat": 31.0769, "lng": 109.8772, "modern": "巫山, 重庆", "ancient": "巫山", "desc": "三峡中段"},
    "剑门": {"lat": 32.2800, "lng": 105.5200, "modern": "剑阁, 四川", "ancient": "剑门关", "desc": "川陕交界险关"},

    # Yangtze Delta / Southeast
    "扬州": {"lat": 32.3942, "lng": 119.4130, "modern": "扬州, 江苏", "ancient": "扬州/广陵", "desc": "唐代最繁华城市之一"},
    "广陵": {"lat": 32.3942, "lng": 119.4130, "modern": "扬州, 江苏", "ancient": "广陵", "desc": "扬州古称"},
    "苏州": {"lat": 31.2989, "lng": 120.5853, "modern": "苏州, 江苏", "ancient": "苏州/吴", "desc": "江南水城"},
    "杭州": {"lat": 30.2741, "lng": 120.1551, "modern": "杭州, 浙江", "ancient": "钱塘/余杭", "desc": "西湖名城"},
    "越": {"lat": 30.0000, "lng": 120.1500, "modern": "绍兴, 浙江", "ancient": "越", "desc": "古代越国地区"},
    "吴": {"lat": 31.2989, "lng": 120.5853, "modern": "苏州附近", "ancient": "吴", "desc": "古代吴国地区"},
    "钱塘": {"lat": 30.2741, "lng": 120.1551, "modern": "杭州, 浙江", "ancient": "钱塘", "desc": "杭州旧称"},
    "镇江": {"lat": 32.2120, "lng": 119.4551, "modern": "镇江, 江苏", "ancient": "润州/北固山", "desc": "扬子江边古城"},
    "润州": {"lat": 32.2120, "lng": 119.4551, "modern": "镇江, 江苏", "ancient": "润州", "desc": "镇江古称"},

    # Hubei / Central
    "武汉": {"lat": 30.5928, "lng": 114.3055, "modern": "武汉, 湖北", "ancient": "夏口/鄂州", "desc": "长江汉江交汇"},
    "黄鹤楼": {"lat": 30.5440, "lng": 114.3050, "modern": "武汉, 湖北", "ancient": "黄鹤楼", "desc": "江南三大名楼之一"},
    "荆州": {"lat": 30.3346, "lng": 112.2384, "modern": "荆州, 湖北", "ancient": "荆州/江陵", "desc": "三国古战场"},
    "江陵": {"lat": 30.3346, "lng": 112.2384, "modern": "荆州, 湖北", "ancient": "江陵", "desc": "荆州古称"},
    "鹦鹉洲": {"lat": 30.5500, "lng": 114.2500, "modern": "武汉, 湖北", "ancient": "鹦鹉洲", "desc": "武汉江中沙洲"},
    "岳阳楼": {"lat": 29.3573, "lng": 113.1134, "modern": "岳阳, 湖南", "ancient": "岳阳楼", "desc": "江南三大名楼"},

    # Jiangxi
    "庐山": {"lat": 29.5608, "lng": 115.9842, "modern": "庐山, 江西", "ancient": "庐山/匡庐", "desc": "江西名山"},
    "浔阳": {"lat": 29.7350, "lng": 116.0020, "modern": "九江, 江西", "ancient": "浔阳/江州", "desc": "九江古称"},
    "九江": {"lat": 29.7350, "lng": 116.0020, "modern": "九江, 江西", "ancient": "浔阳", "desc": "江西北部"},

    # Henan / Central Plains
    "嵩山": {"lat": 34.4833, "lng": 112.9500, "modern": "登封, 河南", "ancient": "嵩山/中岳", "desc": "五岳之中岳"},
    "汴州": {"lat": 34.7972, "lng": 114.3074, "modern": "开封, 河南", "ancient": "汴州/大梁", "desc": "宋代首都前身"},

    # Shandong
    "东鲁": {"lat": 35.4154, "lng": 116.5863, "modern": "济宁, 山东", "ancient": "东鲁", "desc": "孔子故乡"},

    # Anhui
    "宣城": {"lat": 30.9440, "lng": 118.7576, "modern": "宣城, 安徽", "ancient": "宣城/宣州", "desc": "皖南山城"},
    "采石": {"lat": 31.6630, "lng": 118.5040, "modern": "马鞍山, 安徽", "ancient": "采石矶", "desc": "李白终老之地"},

    # Hunan
    "潇湘": {"lat": 26.4000, "lng": 111.6000, "modern": "永州, 湖南", "ancient": "潇湘", "desc": "潇水湘水交汇"},
    "湘江": {"lat": 28.1963, "lng": 112.9721, "modern": "湘江, 湖南", "ancient": "湘江/湘水", "desc": "湖南主要河流"},
    "长沙": {"lat": 28.2282, "lng": 112.9388, "modern": "长沙, 湖南", "ancient": "长沙/潭州", "desc": "湖南省会"},
    "橘子洲": {"lat": 28.2000, "lng": 112.9700, "modern": "长沙, 湖南", "ancient": "橘洲", "desc": "湘江中沙洲"},

    # Guangdong / Far South
    "岭南": {"lat": 23.1291, "lng": 113.2644, "modern": "广州, 广东", "ancient": "岭南", "desc": "五岭以南地区"},
    "广州": {"lat": 23.1291, "lng": 113.2644, "modern": "广州, 广东", "ancient": "番禺/广州", "desc": "岭南中心"},
    "桂林": {"lat": 25.2736, "lng": 110.2994, "modern": "桂林, 广西", "ancient": "始安/桂州", "desc": "山水甲天下"},

    # Passes & strategic locations
    "函谷关": {"lat": 34.5200, "lng": 110.8700, "modern": "灵宝, 河南", "ancient": "函谷关", "desc": "关中东大门"},
    "潼关": {"lat": 34.5500, "lng": 110.2500, "modern": "潼关, 陕西", "ancient": "潼关", "desc": "秦晋豫交界要塞"},
    "萧关": {"lat": 36.3500, "lng": 106.2000, "modern": "固原, 宁夏", "ancient": "萧关", "desc": "关中北部门户"},

    # Special literary locations
    "桃花源": {"lat": 29.1700, "lng": 111.2700, "modern": "桃花源, 湖南", "ancient": "桃花源", "desc": "陶渊明笔下世外桃源"},
    "赤壁": {"lat": 29.7200, "lng": 114.0000, "modern": "赤壁, 湖北", "ancient": "赤壁", "desc": "三国赤壁之战"},
}

# Aliases mapping variant spellings to canonical entries
LOCATION_ALIASES: dict[str, str] = {
    "河": "黄河",
    "大河": "黄河",
    "江": "长江",
    "大江": "长江",
    "岱宗": "泰山",
    "岱": "泰山",
    "匡庐": "庐山",
    "太华": "华山",
    "益州": "成都",
    "南山": "终南山",
    "广陵": "扬州",
    "润州": "镇江",
    "江州": "浔阳",
    "浔阳": "九江",
    "夔州": "夔州",
    "吴地": "吴",
    "吴中": "苏州",
    "越中": "越",
    "楚": "荆州",
    "边塞": "玉门关",
    "西域": "轮台",
    "河西": "凉州",
    "朔方": "幽州",
    "北疆": "阴山",
}


def get_location(name: str) -> dict | None:
    """Look up a location by name, checking aliases too."""
    if name in TANG_LOCATIONS:
        entry = TANG_LOCATIONS[name].copy()
        entry["name"] = name
        return entry
    if name in LOCATION_ALIASES:
        canonical = LOCATION_ALIASES[name]
        if canonical in TANG_LOCATIONS:
            entry = TANG_LOCATIONS[canonical].copy()
            entry["name"] = name
            entry["ancient_name"] = canonical
            return entry
    return None
