<?php

namespace wokster\translationmanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SourceMessageSearch represents the model behind the search form about `common\modules\translation\models\SourceMessage`.
 */
class SourceMessageSearch extends SourceMessage
{
    public $ru;
    public $en;
    public $fr;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message', 'ru', 'en', 'fr'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SourceMessage::find()
            ->leftJoin('message as ru', 'ru.id = source_message.id and ru.language = "ru"')
            ->leftJoin('message as fr', 'fr.id = source_message.id and fr.language = "fr"')
            ->leftJoin('message as en', 'en.id = source_message.id and en.language = "en"');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'ru.translation', $this->ru])
            ->andFilterWhere(['like', 'fr.translation', $this->fr])
            ->andFilterWhere(['like', 'en.translation', $this->en]);

        return $dataProvider;
    }
}
